echo 'database.php設置'
mv -v ./database.php ../Config/

echo 'config.js設置'
mv -v ./config.js ../webroot/js/

echo 'htaccess設置'
mv -v ./htaccess ../../.htaccess
mv -v ./app_htaccess ../.htaccess
mv -v ./webroot_htaccess ../webroot/.htaccess
