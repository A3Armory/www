####What is this####
This is a framework for Arma 3 Wasteland stats using CodeIgniter.

Features:

- Live Scoreboard (/scoreboard)

  ![scoreboard](http://i.imgur.com/V49MLLZ.png)
  
  (Shows the statistics about players currently active on the server)

- Leaderboard (/leaderboard)

  ![leaderboard](http://i.imgur.com/aF9MKw5.png)
  
  (Shows same data as the scorebaord, but for the top 1000 players within the last month)


#### Requirements ####
1. Apache HTTP Server (support for .htaccess)
2. PHP 5.1.6 or newer
3. CouchDB database (loaded for A3Wasteland data), and ElasticSearch (with propper indexes created)
4. Make sure that your web server machine is able to reach the machine where CouchDB, and ElasticSearch  

  This only needed when your website and database are in different machines. A good way to set this up is to make a firewall rule allowing incomming connections from the IP address web-server machine. **Do not open the CouchDB, and ElasticSearch ports to the world.**


####Seitting up the web-framework####
  1. Upload the entire repository contents into a directory in your web-server
  2. Edit the ```application/config/globals.php``` to point to your CouchDB database, and ElasticSearch index.


