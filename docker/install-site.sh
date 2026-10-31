#!/bin/bash
# Run before each new pod starts (migrate in the App), in /var/www/html.
#
# First the image's own start script: it copies WordPress to an empty volume
# and writes wp-config.php, and then only prints Apache's version. Then the
# theme on the volume is replaced with the one in this image. A change made
# to it in the WordPress admin is lost on the next deploy.
set -euo pipefail

docker-entrypoint.sh apache2 -v

themes=/var/www/html/wp-content/themes
name=technical-blog-wordpress
mkdir -p "$themes"
rm -rf "$themes/.$name.new"
cp -R "/usr/src/$name" "$themes/.$name.new"
rm -rf "$themes/$name"
mv "$themes/.$name.new" "$themes/$name"
echo >&2 "Installed the theme $name from the image"
