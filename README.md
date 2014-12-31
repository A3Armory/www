#A3W Stats#
This is a stats visualization framework for [Arma 3 Wasteland](http://a3wasteland.com/) servers that use the [sock-rpc-stats](https://github.com/micovery/ArmA3_Wasteland.Altis) fork for persistence.

The framework works with stats saved in a [CouchDB](http://couchdb.apache.org/) database, and indexed using [ElasticSearch](http://www.elasticsearch.org/).

Features:

- Live Scoreboard (/scoreboard)

  ![scoreboard](http://i.imgur.com/V49MLLZ.png)
  
  (Shows the statistics about players currently active on the server)

- Leaderboard (/leaderboard)

  ![leaderboard](http://i.imgur.com/aF9MKw5.png)
  
  (Shows same data as the scorebaord, but for the top 1000 players within the last month)


# Requirements #
  1. [Apache HTTP Server](http://httpd.apache.org/)
  2. [PHP 5.1.6 or newer](http://php.net/)
  3. [CouchDB](http://couchdb.apache.org/) database (with A3Wasteland data)
  4. [ElasticSearch](http://www.elasticsearch.org/) (with propper indexes created)
  4. Make sure that your web server machine is able to reach the machine(s) where CouchDB, and ElasticSearch are running (if they are on different machines).



#Seitting up the web-framework#
  1. Upload the entire repository contents into a directory in your web-server
  2. Edit the ```application/config/globals.php``` to point to your CouchDB database, and ElasticSearch indexes.



#Setting up the ElasticSearch indexes#
1. Install the the ElasticSearch CouchDB river plugin

  ```
    ./plugin -i couchdb-river -url https://github.com/A3Armory/www/releases/download/v0.0.1/elasticsearch-river-couchdb-2.4.2-micovery.zip
  ```
  (Note this is a [custom version](https://github.com/elasticsearch/elasticsearch-river-couchdb/pull/86) of the ES CouchDB River Plugin that allows for saving document revisions/history)
2. Create the indexes

    You can do this from the command line using curl, [here is a file](https://github.com/A3Armory/www/blob/master/elasticsearch_curl.txt) with the curl commands



  


