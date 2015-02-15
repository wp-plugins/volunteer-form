PROJECT=volunteerform
VERSION := $(subst v,,$(lastword $(shell git tag -l 'v*' )))
SITE_LESS = ./assets/style.less
SITE_CSS = ./style/volunteerform.css
SITE_CSS_MIN = ./style/volunteerform.min.css
PACKAGE=volunteerform-${VERSION}

build:
	@echo "Building .. "
	lessc ${SITE_LESS} > ${SITE_CSS}
	lessc -x ${SITE_LESS} > ${SITE_CSS_MIN}
	# recess --compile ${SITE_LESS} > ${SITE_CSS}
	# recess --compile ${ADMIN_LESS} > ${ADMIN_CSS}

site-css: ./style/volunteerform.css

webroot/css/*.css: assets/*.less
	# mkdir -p webroot/css
	recess --compile ${SITE_LESS} > ${SITE_CSS}
	recess --compress ${SITE_LESS} > ${SITE_CSS_MIN}

watch:
	echo "Watching less files..."; \
	watchr -e "watch('assets/.*\.less') { system 'make build' }"

package:
	mkdir -p pkg/
	@(test -d .git || echo "ERROR: No git repository found, package building will fail.")
	git archive --format=tar --prefix=$(PROJECT)/ v$(VERSION) | gzip -c9 > ./pkg/$(PACKAGE).tar.gz
	git archive --format=zip --prefix=v$(PROJECT)/ v$(VERSION) > ./pkg/$(PACKAGE).zip
	scp ./pkg/$(PACKAGE).tar.gz s03.do.nikcub.com:/home/virtual/nikcub.com/site/downloads/volunteerform/
	scp ./pkg/$(PACKAGE).zip s03.do.nikcub.com:/home/virtual/nikcub.com/site/downloads/volunteerform/

version:
	@echo "Version is $(VER)"

.PHONY: watch site-css
