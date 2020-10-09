GegoCart - Multi Vendor Shopping Cart based on Laravel Framework and NUXT JS
For complete feature list, preset-demo & support, check https://gegocart.com

## GegoCart - Multi-Vendor Shopping Cart

The software includes the following

- Admin App (this repo https://github.com/gegocart/admin )
- Seller / Vendor app ( https://github.com/gegocart/seller )
- Buyer / Shopping Cart app ( https://github.com/gegocart/buyer )
- Mobile App - (In Development)
- POS App - ( In Development)

### Installation of the Admin Laravel App

Pull the code from Repo

<pre>
	<code> git clone git@gitlab.com:Gego-cart/admin-app.git admin-app</code>
</pre>

Composer Install

<pre>
	<code> $ composer install </code>
</pre>

Install NPM packages

<pre>
	<code> $ npm install </code>
</pre>

Duplicate the env.example file to .env and set the Database.
Install the Gego-Cart with Test Install. It will install the software and run the seeder.

<pre>
	<code> $ bash testinstall.sh</code>
</pre>

### Using Postman Colletcion

There is a postman collection in the root folder. Use that for your development works.

<pre>
	<code> Gegocart%20API.postman_collection.json</code>
</pre>
