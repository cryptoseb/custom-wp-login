# Custom WordPress Login Page

Wanted to edit the WordPress login pages for the few sites that I manage to keep the branding consistent across all aspects of their website. Not that it really matters, because nobody but the owners and my team would ever need to access this page. But... it was fun and I was bored

I've added comment lines so that you can take this code and modify it as needed as well. These sites all have the addition of the `Login No Captcha reCAPTCHA (Google)` plugin. I considered changing the login URL, or adding HTTP_Basic_Auth, etc. but I didn't feel like what little security that would provide was worth it. I just mandate 16+ character passwords for the few logins we have, and have added the `PHP native password hash` plugin to force bcrypt or Argon2 using PHP's `password_hash()`

## Some Notes:
1. You should install and activate a Child Theme before modifying your functions.php file

2. I have fixed the styling on mobile. I had ZERO clue how CSS worked when I originally copied the code linked from multiple sources. I now have a clue and made it look better

3. Best to serve the images for the background and logo over https or most major browsers will display a warning

4. You only need the code below ` Add your custom theme functions here.`, the rest is specific to my current Child Theme

## Future Additions:
1. Styling the `Privacy Policy` link at the bottom of the page

2. Add some more complex styling now that I have a basic understanding of HTML/CSS
