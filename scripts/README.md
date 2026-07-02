# Scripts

Small helpers for local DB workflow. Not tracked by cPanel deploy — sirf local convenience ke liye.

## `db-export-local.ps1`
XAMPP ke local `kelarix` DB ka dump nikalta hai + parallel copy banata hai jismein URLs live domain se replace ho jaate hain. Output `db-dumps/` folder mein.

**Kaise chalayen:**
1. Pehli baar edit karo: `$LiveUrl = 'https://YOURDOMAIN.com'`
2. PowerShell mein project root pe:
   ```powershell
   .\scripts\db-export-local.ps1
   ```
3. `db-dumps/kelarix-for-live-YYYYMMDD-HHMM.sql` file cPanel phpMyAdmin → Import mein daal do
4. Live pe **Better Search Replace** plugin chalao — serialized data ke andar bache URLs bhi fix ho jaate hain

## `db-dumps/`
Git mein excluded hai (dumps mein sensitive data hota hai). Local convenience folder samajh lo.
