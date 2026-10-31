# tech.gathering.org: the official WordPress image with this theme in it,
# and uploads of up to 256 MB. Runs as systemstotte/technical in
# gathering/sys-k8s-workloads.
#
# WordPress itself lives on the site's volume and updates itself there.
# install-site puts this theme on the volume before each new pod starts.
FROM wordpress:php8.4-apache

COPY . /usr/src/technical-blog-wordpress/
RUN cd /usr/src/technical-blog-wordpress \
    && mv docker/uploads.ini /usr/local/etc/php/conf.d/uploads.ini \
    && mv docker/install-site.sh /usr/local/bin/install-site \
    && rmdir docker
