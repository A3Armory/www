####What is this####
This is a stats framework for [Arma 3 Wasteland](http://a3wasteland.com/) servers that use the [Sock-RPC-Stats fork](https://github.com/micovery/ArmA3_Wasteland.Altis) for database persistence.

The framework works with stats saved in a CouchDB database, and indexed using ElasticSearch.

Features:

- Live Scoreboard (/scoreboard)

  ![scoreboard](http://i.imgur.com/V49MLLZ.png)
  
  (Shows the statistics about players currently active on the server)

- Leaderboard (/leaderboard)

  ![leaderboard](http://i.imgur.com/aF9MKw5.png)
  
  (Shows same data as the scorebaord, but for the top 1000 players within the last month)


#### Requirements ####
  1. [Apache HTTP Server](http://httpd.apache.org/)
  2. [PHP 5.1.6 or newer](http://php.net/)
  3. [CouchDB](http://couchdb.apache.org/) database (loaded for A3Wasteland data), and [ElasticSearch](http://www.elasticsearch.org/) (with propper indexes created)
  4. Make sure that your web server machine is able to reach the machine where CouchDB, and ElasticSearch

    This only needed when your website and database are in different machines. A good way to set this up is to make a firewall rule allowing incomming connections from the IP address web-server machine. **Do not open the CouchDB, and ElasticSearch ports to the world.**



####Seitting up the web-framework####
  1. Upload the entire repository contents into a directory in your web-server
  2. Edit the ```application/config/globals.php``` to point to your CouchDB database, and ElasticSearch index.



####Setting up the ElasticSearch indexes####
1. Install the the ElasticSearch CouchDB river plugin

  ```
    bin/plugin -install elasticsearch/elasticsearch-river-couchdb/2.4.1
  ```
2. Create the indexes

    You can do this from the command line using curl, [here is a file](https://github.com/A3Armory/www/blob/master/elasticsearch_curl.txt) with the curl commands



  


