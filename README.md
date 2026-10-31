# Tech Blog Theme for Wordpress

The theme of [tech.tg.no](https://tech.tg.no).

## How it is deployed

A push to `main` builds `ghcr.io/gathering/technical-blog-wordpress:latest`: the official `wordpress:php8.4-apache` image with this theme in it ([Dockerfile](Dockerfile)). The image is also rebuilt every Monday, for the base image's patches. The site runs as `systemstotte/technical` in [sys-k8s-workloads](https://github.com/gathering/sys-k8s-workloads), which deploys each new build.

Before a new pod starts, [`install-site`](docker/install-site.sh) copies the theme to `wp-content/themes/technical-blog-wordpress` on the site's volume. Change the theme here, not in the WordPress admin: the next deploy replaces it.

To try it locally:

```bash
docker build -t technical-blog-wordpress .
```
