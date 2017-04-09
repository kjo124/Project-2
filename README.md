# Project-2
CT310

All pages to be developed using PHP, HTML and CSS

A Home page - Welcome message, info and links about other sections etc.

An About us page

A Common Header (Title and Logo), Footer and Navigation elements on all pages -
Please implement using the PHP include tag.

An Authentication Page. One for each of you on the team (Admin), a third with Username:
ct310 (Admin) & a customer (customer).
  ** Support for two classes of site users, customers and administrators. **
  ** Customers have a shopping basket and can submit orders. **
  ** A customer can add and remove ingredients from a shopping basket and submit
     an order. Once submitted, the customer and the administrator(s) receive and
     email version of the order. **
  ** Both administrators can recover, reset if you will, passwords through an
     (relatively) secure email protocol. **
  ** If a designated user looses or forgets a password, a special recovery
     process through email will be impmemented. This will be discussed further in
     lecture. What is critical is the user carry out the entire process in the
     same browser session. **

Individual pages for each ingredient sold.
  ** Ingredient pages build on-the-fly from information stored in a site database. **
  ** Administrators can add new ingredients through a custom built browser interface **
  ** Once an administrator is authenticated with the site, they can initiate a
  process of adding an ingredient. That process will require submission of a
  name, new text description, and the uploading of an image. The text will all
  be entered into a database of your construction. The file name of the image
  will also go in the database. How to upload images will be covered in lecture. **

Provision for commenting on an ingredient. Comments may only be entered by
authenticated users.
  ** Customer comments should be retained in the site database. To be clear,
     this means that once submitted comments remain a permenant part of the site. **
  ** do not take away the ability for a Customer or Administrator to add
     comments. An administrator may also edit any previously left comment and
     even delete a comment. **

You need sanitize user input. Refer to this Sanitize and Validate Data with PHP
Filters for a nice explanation of how best to sanitize input.

Each Ingredient needs a picture, and you must include an acknowledgement with
each picture clearly showing the origin of the picture and in so doing
indicating your right to use that image.

All your pages will carry a disclaimer on the footer in fine print which reads:
"This site is part of a CSU CT 310 Course Project." The text "CT 310" will be a
link to the course homepage.

You must use the Bootstrap Framework to support your implementation.

Have a color palette theme of your choice to maintain consistency and professional
look and feel.
