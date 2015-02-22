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
  
- Player count (/playercount_history)

  ![player_count](http://i.imgur.com/qJtZzg5.png)
  
  (Shows the player count over the last 7 days)
  
- Vehicle count (/vehiclecount_history)

  ![vehicle_count](http://i.imgur.com/FK5R4S3.png)
  
  (Shows the player count over the last 7 days)
  
- Object count (/objectcount_history)

  ![object_count](http://i.imgur.com/cHrZu1B.png)
  
  (Shows the object count over the last 7 days)
  

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
    ./bin/plugin --install couchdb-river --url  https://github.com/A3Armory/www/releases/download/v0.0.1/elasticsearch-river-couchdb-2.4.2-micovery.zip
  ```
  (Note this is a [custom version](https://github.com/elasticsearch/elasticsearch-river-couchdb/pull/86) of the ES CouchDB River Plugin that allows for saving document revisions/history)
2. Install the Kopf plugin 

  Since you are going to be managing, and working with ElasticSearch, you should also install the Kopf plugin to help you manage ES.
  ```
    ./bin/plugin --install lmenezes/elasticsearch-kopf/1.4.3
  ```
  You can access Kopf at [http://localhost:9200/_plugin/kopf](http://localhost:9200/_plugin/kopf)
  
3. Install Git Bash (Windows only)

  If you are in Windows, you should install [MsyGit](https://msysgit.github.io/). It comes with Git bash, where you can use the "curl" command line utility to talk to ElasticSearch.

2. Create the A3Wasteland indexes

   1. If you are on Windows, open up Git Bash,  (if you are on Linux, just open a new terminal)
   2. Grab the contents of [this file](https://github.com/A3Armory/www/blob/master/elasticsearch_curl.txt), and paste it in the terminal. Note that all the curl commands in the file assume your database is named "a3w", if you have a different name, make sur to modify it in the file before running the commands.
   3. If you are using ElasticSearch 1.4.3, Groovy scripting is disabled by default, you'll have to enable it by modifing the ```config/elasticsearch.yaml``` and adding the following property ```script.groovy.sandbox.enabled: true``` and then restarting it.

  


