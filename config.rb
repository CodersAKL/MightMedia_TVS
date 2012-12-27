# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
ourPath = File.absolute_path(File.dirname(__FILE__) + "../../../")
ourPath[0..3] = "http://dev/generated_images/"
http_path = ourPath

css_dir = "application/"
sass_dir = "application/"

images_dir = "application/"

generated_images_dir = "../../../generated_images/application/"
generated_images_path = "../../../generated_images/application/"

# relative_assets = true

sass_options = {:debug_info => false}

# You can select your preferred output style here (can be overridden via the command line):
output_style = :expanded # :expanded or :nested or :compact or :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass