# For Staff Login 

## Post Method
## http://localhost:8000/api/staff/login

```
{
    "staff_id":"1256366",
    "password":"1234"
    
}
```


# For Staff Punch-in 

## Post Method
## http://localhost:8000/api/staff/punch-in

```
{
    "staff_id":"1256366",
    "datetime":"2023-11-18 10:25:28",
    "latitude":"122.222545",
    "longitude":"545.5454515"
}
```


# For Staff Punch-out 

## Post Method
## http://localhost:8000/api/staff/punch-out

```
{
    "staff_id":"1256366",
    "datetime":"2023-11-18 18:00:35",
    "latitude":"122.222545",
    "longitude":"545.5454515"
}
```


# For Staff Change Password 

## Post Method
## http://localhost:8000/api/staff/changePassword

```
{
    "staff_id":"1256366",
    "current_pass":"1234",
    "new_pass":"9999",
    "re_pass":"9999"
}
```


# For Admin Panel 

## Post Method
## http://localhost:8000/login

```
{
    "admin_id":"963852",
    "password":"1234"
    
}
```

<!-- 
# For Staff List 

## Get Method
## http://localhost:8000/api/staff/list


# For Staff Attendance List 

## Post Method
## http://localhost:8000/api/staff/attendance

```
{
    "staff_id":"1256366",
    "start_date":"2023-11-18",
    "end_date":"2023-11-19"
}
``` -->


