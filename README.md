### CURL SHARE FACEBOOK 
**CHỨC NĂNG**
+ Share bài viết của bạn bằng chính các page mà bạn đang có

**HƯỚNG DẪN**
+ Nhập Access Token ( Có thể nhập nick Clone ) tại dòng **4**
```php
 $access_token = "EAAA...";
```
+ Nhập ID người mà muốn chạy Curl Share tại dòng **5** ( Lưu ý : Curl sẽ tự động lấy bài viết gần nhất của người đó và chạy curl lên hãy chắc rằng bài viết của người đó phải để ở chế độ **công khai** )
```php
 $id = "100012668051362";
```
+ Nhập ID Fanpage mà bạn không muốn nó Share bài viết của bạn tại dòng thứ **6**
```php
 $page_avoid = ["123","456","789"];
```

**Hướng dẫn chi tiết** ( Video ) : [Xem Video](https://youtu.be/OlhK2p5sa_E)

+ **Localhost** : Sau khi chỉnh sửa xong bạn chỉ cần chạy file là xong ( Có thể thay đổi thời gian chạy Curl tại dòng **46** )
```html
  <meta http-equiv="refresh" content="30"> <!-- Ở đây mình để 30s chạy file 1 lần -->
```
+ **Upload Website** : Để chạy tự động bạn chỉ cần setup **Cronjob** cho em nó là xong ( Có thể xóa dòng thứ **46** )

> Contact me : [Facebook](https://www.facebook.com/nevsvn) . [Instagram](https://www.instagram.com/lequangvyy/) . [Gmail](mailto:lequangvy812@gmail.com)
