# If WITH_MINIFY_CSS is on, this script is executed for the web-minify-css
# target to concatenate all files before they are minified.  This cannot be done
# during the configure step because it depends on the web-scss target to
# preprocess .scss files.
function(cat IN_FILE OUT_FILE)
  file(READ ${IN_FILE} CONTENTS)
  file(APPEND ${OUT_FILE} "${CONTENTS}")
endfunction()

file(WRITE master.css "")
cat(screen.css master.css)
cat(master-no-scss.css master.css)
