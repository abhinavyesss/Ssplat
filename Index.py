import requests
import mariadb
import sys
if __name__=='__main__':
    try:
        conn=mariadb.connect(user="root",password="Aniket123$%^0987",host="127.0.0.1",port=3306,database="News")
    except mariadb.Error as e:
        print(f"Error connecting to MariaDB Platform: {e}")
        sys.exit(1)
    cur=conn.cursor()
    cur.execute("CREATE TABLE news (author VARCHAR(255), title VARCHAR(255), description VARCHAR(2000), url VARCHAR(2000))")
    url='http://newsapi.org/v2/top-headlines?''country=us&''apiKey=451a1d489a4b40739bc4e1eca7856537'
    response=requests.get(url)
    for i in response.json()['articles']:
        sql="INSERT INTO news (author,title,description,url) VALUES (%s,%s,%s,%s)"
        temp=i['author']
        if temp=='':
            temp='CBS Sports'
        val=(temp,i['title'],i['description'],i['url'])
        cur.execute(sql, val)
        conn.commit()
    cur.close()
    conn.close()
