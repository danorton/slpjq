# $Id$
#
# © 2010 teeny-tiny websites
# http://www.teenytinywebsites.com
#
# Distributed under the terms of the GNU General Public License, version 3.0
# http://www.gnu.org/licenses/gpl-3.0.html

MODULE=slpjq
DOXYGEN=/usr/bin/doxygen

# These are expected by our Doxygen configuration.
export MODULE_PATH=.
export OUTPUT=./dox


MODULE_OUTPUT=$(OUTPUT)/$(MODULE)

# we have to make "clean" here, else Doxygen would try to document its prior output!
documentation: $(MODULE).doxy $(MODULE).install $(MODULE).module clean \
	css/$(MODULE).css \
	theme/slpjq-slider.tpl.php
	-mkdir -p $(MODULE_OUTPUT)
	$(DOXYGEN) $<

clean:
	-rm $(MODULE_OUTPUT)/html/* $(MODULE_OUTPUT)/xml/*
	-rmdir $(MODULE_OUTPUT)/html $(MODULE_OUTPUT)/xml $(MODULE_OUTPUT)
