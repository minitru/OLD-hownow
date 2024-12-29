*************************************
* http://themeforest.net/user/flips *
*************************************
          _______           
         / __/ (_)___  _____
        / /_/ / / __ \/ ___/
       / __/ / / /_/ (__  ) 
      /_/ /_/_/ .___/____/  
             /_/            

*************************************
Thank you for purchasing the simplicity template.

Compatibility: Firefox 3, Firefox 2, Safari 3, IE 7, IE 6
Doctype: XHTML 1.0 Strict
Layout: CSS tableless

Included Files:
1. simplicity.psd, Photoshop file
2. template, Directory containing all code and site assets

Template Breakdown:
1. Portfolio page, including jQuery slider

NB: All text in this template is actual text, no images have been used for text, all effects have been achieved using only CSS.

Adding extra pages:

Adding extra pages is straightforward, but must be done very precisely. You do not need to update the javascript files, all of the simplicity template functionality is attached dynamically. All you need to do is add a new section, so look for a part marked with; <!-- SECTION [about] --> for example, and copy it. Update the content of the section to whatever you like but you must however, change two things. The name attribute of the starting 'a' element and the id of the following 'div' element, you can leave the class of where it is. To keep everything working keep these two attributes the same, you should be able to see this from the three example sections. The only other thing to do is put a new navigation tab in at the top. Find the 'ul' element near the top with an id of 'navigation' and copy one of the 'li' element lines in its entirety. For example say we copied the 'about' navigation tab and we wanted to change it to point to a services section we'd created, this is what we copied;

<li><a id="nAbout" href="#about">About</a></li>

So first we change the text of the navigation tab, giving us;

<li><a id="nAbout" href="#about">Services</a></li>

Then we change the target of the link to be the id of our section we created earlier (don't remove the hash);

<li><a id="nAbout" href="#services">Services</a></li>

Then this is the most important, changing the links' id has to be the id of the section, with a capital letter at the front, then preceeded by the letter 'n' (to indicate this is a navigation link to section x). So our example now becomes;

<li><a id="nServices" href="#services">Services</a></li>

Changing which section the page starts on:

To change which section the page starts on is as simple as changing one word. Looking toward the top of the file (1.html) you should see a line;

start('portfolio');

Change the word within the single quotes to the id of the section you wish the page to start at.

Changing the items in the Portfolio:

To do this look at the source code for 1.html and find the parts marked with; <!-- PANEL [photo1] --> Each of these is a photo panel. Just copy one of the existing panels and replace any descriptions and details you need. With respect to images, if you want about 5 lines of descriptive text underneath ensure that the maximum height of your images is 245 pixels.

Setting up the Contact form:

Find out which you can use first of all, the PHP or ASP script (the PHP script is the default). Both are quite simple, they do not provide any advanced mail sending capabilities. Whichever one you pick you will need to update two parts of the script. Open it up in a text editor and change the two variables $recipient and $redirect (or in ASP sRecipient and sRedirect) to be the email address you would like messages sent to and the page to redirect to after a message has been sent successfully, could be a thank you page or just back to your sites' homepage.

NB: Don't forget, if you want to use the ASP script instead of the default PHP, change the form action to point to './send.asp'.

WARNING: Changing the contact form fields will require changes to the validation scripts that I cannot really go into depth about here. If you do need to change the fields please visit ThemeForest and send me a message and I'll try my best to help you out.

ADDITIONAL: If you wish the navigation tabs to be highlighted when their respective section is active there is a single CSS rule in the file screen.css which has been commented out, as I thought most people would not want it. Search for the following line;

#navigation a.active

And if you want them highlighted simply remove the '/*' from the start of the rule and the '*/' from the end.