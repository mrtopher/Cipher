# Cipher - Encrypted ExpressionEngine Fieldtype

Are you storing sensitive information in your EE install? Would you sleep better at night knowing that your data/content was encrypted in the database? If so then Cipher is for you!

Cipher is a plain text EE fieldtype that displays content correctly in the publish screen and on the font-end of your website but stores the value as an encrypted string within your EE database. This fieldtype uses CodeIgniters encrypt library and allows you to provide a unique encryption key for each field you add using this type for ultimate security.

## Installation

1. Upload the Cipher directory to /system/expressionengine/third_party.

2. Navigate to Add-ons -> Fieldtypes and click Install next to the Cipher fieldtype.

3. Cipher will now be an option in the Type drop down menu on the Add Field form.