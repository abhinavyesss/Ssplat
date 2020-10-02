if __name__=='__main__':
    import requests
    import mariadb
    import sys
    try:
        conn=mariadb.connect(user="root",password="Aniket123$%^0987",host="127.0.0.1",port=3306,database="News")
    except mariadb.Error as e:
        print(f"Error connecting to MariaDB Platform: {e}")
        sys.exit(1)
    cur=conn.cursor()
    cur.execute("CREATE TABLE bigoof (author VARCHAR(255), title VARCHAR(255), description VARCHAR(2000), url VARCHAR(2000))")
