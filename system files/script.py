##import random
##import string
##def userRecords():

def openFile():
    users =[]
    my_file = open("userData.txt","r")
    #print (my_file.read())
    users.append([my_file])
    return users
    my_file.close()

def db_insert(users):
    import _mysql
    import traceback
    try:
        print("Connecting to database")
        data_ = _mysql.connect(host="0.0.0.0",user="sia",password="",data_="c9")
    except:
        print("Failed!!!")

    for pro in range(0,500000):
        prof = """insert into user(username,first_name,last_name, password)
            values('%d','%s','%s','%s')""" %(users[pro][0],users[pro][1],users[pro][2],users[pro][3])
        print (prof)
        try:
            data_.query(pro)
            data_.commit()
        except Exception as e:
            print(" ")
            traceback.print_exc()
            data_.rollback()

    data_.close()


def main():
  import traceback 
  
  #print ("generating records.....")

  try:
    users = openFile()
    print ("user files loaded")
  except:
    print ("An error occured")

  print ("Insertion started")

  try:
    db_insert(users)
    print ("All Done!")
  except Exception as e:
    print ("error occured",e)
    traceback.print_exc()

if __name__ == '__main__':
	main()

