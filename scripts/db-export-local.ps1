# =============================================================
#  Local DB export helper (Windows / XAMPP)
#  Runs mysqldump on your local kelarix DB, drops a timestamped
#  .sql file into /db-dumps/ ready to import on live server.
#
#  Usage:  right-click -> Run with PowerShell
#          OR from PowerShell:  .\scripts\db-export-local.ps1
# =============================================================

$ErrorActionPreference = 'Stop'

# --- Config (adjust if your XAMPP path is different) ---
$MysqlDumpExe = 'C:\xampp\mysql\bin\mysqldump.exe'
$DbName       = 'kelarix'
$DbUser       = 'root'
$DbPass       = ''            # XAMPP default is empty. Set if you changed it.
$LocalUrl     = 'http://localhost/kelarix'
$LiveUrl      = 'https://YOURDOMAIN.com'    # <-- change once, forever

# --- Output ---
$RepoRoot = Split-Path -Parent $PSScriptRoot
$OutDir   = Join-Path $RepoRoot 'db-dumps'
if (-not (Test-Path $OutDir)) { New-Item -ItemType Directory -Path $OutDir | Out-Null }

$Stamp   = Get-Date -Format 'yyyyMMdd-HHmm'
$RawFile = Join-Path $OutDir "kelarix-local-$Stamp.sql"
$LiveFile = Join-Path $OutDir "kelarix-for-live-$Stamp.sql"

Write-Host "Exporting local DB '$DbName' ..." -ForegroundColor Cyan

$argsList = @('-u', $DbUser)
if ($DbPass -ne '') { $argsList += "-p$DbPass" }
$argsList += @('--single-transaction', '--default-character-set=utf8mb4', $DbName)

& $MysqlDumpExe @argsList | Out-File -FilePath $RawFile -Encoding utf8
Write-Host "  Raw dump:  $RawFile" -ForegroundColor Green

# --- Copy + URL replace for live upload ---
Write-Host "Preparing live-ready copy with URLs replaced ..." -ForegroundColor Cyan
(Get-Content $RawFile -Raw) -replace [regex]::Escape($LocalUrl), $LiveUrl |
    Set-Content -Path $LiveFile -Encoding utf8
Write-Host "  Live-ready: $LiveFile" -ForegroundColor Green

Write-Host ""
Write-Host "Done." -ForegroundColor Yellow
Write-Host "  * Upload  kelarix-for-live-$Stamp.sql  to cPanel phpMyAdmin -> Import"
Write-Host "  * Then run 'Better Search Replace' plugin on live to catch any serialized URLs"
