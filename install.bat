@echo off
setlocal enabledelayedexpansion
title Installer - Sistem Pendaftaran Kampus (PMB) IPWIJA

echo ===================================================
echo   INSTALLER - Sistem Pendaftaran Kampus (PMB) IPWIJA
echo ===================================================
echo.

REM --- 1. Pastikan file .env ada ---
echo [1/7] Memeriksa file .env...
if not exist .env (
    echo File .env tidak ditemukan. Membatalkan proses.
    pause
    exit /b 1
)

REM --- 2. Build & jalankan seluruh container ---
echo [2/7] Menjalankan Docker Compose (build + up)...
docker compose up -d --build
if errorlevel 1 (
    echo Gagal menjalankan docker compose. Periksa Docker Desktop Anda.
    pause
    exit /b 1
)

REM --- 3. Tunggu container siap ---
echo [3/7] Menunggu container siap...
timeout /t 15 /nobreak

REM --- 4. Siapkan project & dependency Laravel ---
echo [4/7] Menyiapkan Laravel di container pmb_app...
docker exec pmb_app sh -c "if [ ! -f composer.json ]; then composer create-project laravel/laravel . --no-interaction; else composer install --no-interaction; fi"

REM --- 5. Generate application key ---
echo [5/7] Generate APP_KEY...
docker exec pmb_app php artisan key:generate --force

REM --- 6. Migrasi & seeding database ---
echo [6/7] Menjalankan migrasi database...
docker exec pmb_app php artisan migrate --seed --force

REM --- 7. Selesai ---
echo [7/7] Instalasi selesai!
echo.
echo ===================================================
echo   Aplikasi bisa diakses di   : http://localhost:4080
echo   Database (eksternal)       : 127.0.0.1:33061
echo   N8N Workflow                : http://localhost:5678
echo   Ngrok Web Interface          : http://localhost:4040
echo ===================================================
echo.
pause

