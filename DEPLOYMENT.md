# Kelarix — Deployment Guide

Local machine se GitHub par push → cPanel Git Version Control se live pe deploy.
Ye repo sirf `wp-content/themes/kelarix/` track karta hai. WordPress core, DB, aur uploads live server par hi rehte hain.

---

## Part A — One-time setup (sirf pehli baar)

### A1. Local Git repo initialize karo

XAMPP WordPress root pe (yani `D:\xampp\htdocs\kelarix`) terminal khol ke:

```bash
git init
git add .
git commit -m "Initial commit: Kelarix theme + deploy config"
git branch -M main
```

Check karo — `git status` sirf theme files dikhaye. Agar WordPress core files ya `wp-config.php` list mein aa raha hai to `.gitignore` galat parse hua hai — mujhe batao.

### A2. GitHub repo banao

1. https://github.com/new khol → repo name: `kelarix` (private recommended)
2. **"Add README/gitignore/license" wale checkboxes UNCHECKED rakho** — hum apni files push kar rahe hain
3. Create karne ke baad GitHub aap ko commands dikhayega. Use karo:

```bash
git remote add origin https://github.com/YOUR-USERNAME/kelarix.git
git push -u origin main
```

Password mange to GitHub Personal Access Token banao (Settings → Developer settings → Tokens → Generate) — plain password ab kaam nahi karta.

### A3. cPanel mein Git Version Control setup

1. cPanel → **Git™ Version Control** → **Create**
2. Fields fill karo:
   - **Clone URL:** `https://YOUR-TOKEN@github.com/YOUR-USERNAME/kelarix.git`
     (Private repo hai to URL mein token embed karo — cPanel har pull pe token use karega. Token banate waqt sirf `repo` scope de do.)
   - **Repository Path:** `/home/CPANEL_USER/repositories/kelarix`
     (koi bhi path chalega jo `public_html` ke bahar ho)
   - **Repository Name:** `Kelarix`
3. **Create** click karo. cPanel clone kar dega.

### A4. `.cpanel.yml` mein username replace karo

Repo root ke `.cpanel.yml` file mein `CPANEL_USER` ko apne actual cPanel username se replace karo (2 jagah). Save → commit → push:

```bash
git add .cpanel.yml
git commit -m "Set deploy path for live server"
git push
```

### A5. Pehli deployment

cPanel → Git Version Control → apni repo ke sath `Manage` click → **Pull or Deploy** tab:

1. **Update from Remote** click karo (GitHub se latest code khichta hai)
2. **Deploy HEAD Commit** click karo (`.cpanel.yml` ke tasks run karta hai — theme public_html mein copy hota hai)

Live pe check karo: `yourdomain.com` → theme active hona chahiye. Agar theme visible nahi to WP Admin → Appearance → Themes → **Kelarix** activate karo.

---

## Part B — Daily workflow (har code change ke baad)

Local pe kaam karo. Jab ready ho:

```bash
git add .
git commit -m "Short message about the change"
git push
```

Phir cPanel → Git Version Control → **Update from Remote** → **Deploy HEAD Commit**. Bas. Live pe change ho gaya.

**Pro tip:** Browser mein Ctrl+Shift+R karke hard refresh karo (cache bust). Theme mein bhi `KELARIX_VERSION` bump karte rehna — CSS/JS auto-cache-bust hota hai.

---

## Part C — Database sync (jab zarurat ho)

DB GitHub par nahi rehti. In situations mein sync karna hota hai:

### Scenario 1: Local → Live (initial launch, ya poori site copy karni ho)

**Sirf ek baar karo — is ke baad live pe client content add karega, use overwrite nahi karna.**

1. Local phpMyAdmin → `kelarix` DB select → **Export** tab → SQL → Go → file save ho gayi (e.g., `kelarix-local.sql`)
2. Text editor mein file kholo → Find & Replace:
   - Find: `http://localhost/kelarix`
   - Replace: `https://yourdomain.com`
   - Save
3. cPanel → **MySQL Databases** → new DB banao (naam note karo) + new user banao + user ko DB pe **All Privileges** do
4. cPanel → **phpMyAdmin** → new DB select → **Import** → uploaded SQL → Go
5. cPanel → **File Manager** → `public_html/wp-config.php` edit karo:
   ```php
   define( 'DB_NAME',     'CPANEL_USER_dbname' );
   define( 'DB_USER',     'CPANEL_USER_dbuser' );
   define( 'DB_PASSWORD', 'the-password-you-set' );
   define( 'DB_HOST',     'localhost' );
   ```
6. Site check karo. Agar images tut rahi hain to URLs kahin miss ho gaye — plugin **Better Search Replace** install karo → serialized-safe replace chalao.

### Scenario 2: Live → Local (development ke liye latest content chahiye)

1. Live cPanel → phpMyAdmin → DB export SQL
2. File mein URL replace ulta karo (live URL → localhost)
3. Local phpMyAdmin → apni `kelarix` DB → Import
4. Local site check karo

### Scenario 3: Ongoing safety — automatic live backups

Live pe **UpdraftPlus** plugin install karo (free). Weekly ya daily backup Google Drive/Dropbox pe schedule karo. DB galat import ho jaye to restore easy hota hai.

### Scenario 4: Ek button DB push/pull (paid, sabse smooth)

- **WP Migrate** (formerly WP Migrate DB Pro) — local dashboard se "Push to remote" ek click. Serialized URLs auto-replace. $49/year.
- Alternative: **WP All-in-One Migration** free plugin — poori site ka backup export/import (DB + uploads + theme), 512MB free limit hai.

---

## Part D — Uploads folder (media library)

Ye bhi Git mein nahi hai. Zarurat par manually sync karo:

- **Live → Local:** FTP client (FileZilla) se `wp-content/uploads/` folder download karo → apne local ke same path pe daal do
- **Local → Live:** ulta upload karo

Regular basis pe iski zarurat nahi — sirf jab local pe latest images ke sath test karna ho.

---

## Troubleshooting

| Problem | Fix |
|---|---|
| cPanel Deploy "task failed" | `.cpanel.yml` mein username galat hai, ya `public_html` ka path different hai (kabhi kabhi subdomain hota hai) |
| `Permission denied (publickey)` push karte waqt | GitHub Personal Access Token use karo password ki jagah, ya SSH key setup karo |
| Site white screen after DB import | `wp-config.php` credentials galat hain, ya URL replace incomplete — Better Search Replace chalao |
| Live pe old CSS dikh raha hai | `functions.php` mein `KELARIX_VERSION` bump karo → commit → push → deploy |
| Theme dashboard mein disappear ho gaya | cPanel File Manager se `wp-content/themes/kelarix/style.css` verify karo — deploy properly hua ya nahi |

---

## Files summary (repo mein kya hai)

- `.gitignore` — sirf theme track karta hai, sab ignore
- `.cpanel.yml` — cPanel ke deploy tasks
- `DEPLOYMENT.md` — ye guide
- `wp-content/themes/kelarix/` — actual theme code

Baaki sab (`wp-admin`, `wp-includes`, `wp-config.php`, `uploads`, DB) — sab local ya server par hain, Git mein nahi.
