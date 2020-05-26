# Fitness-Web-Site

Projenin amacı -> Fitness salonuna sahip olan müşterinin salonunda verdiği eğitimleri o eğitimlerin hocalarını, üyelerin bilgi kayıtlarını ve 
aldığı eğitimleri ayrıyetten başlangıç ve bitiş tarihini tutabildiği, her hocanında verdiği eğitime göre diyet ve program listesi hazırlayabileceği
bir web projesidir.
Projenin sağladığı kolaylıklardan bir tanesi ise üyelerin internetin olduğu her yerde yazılmış olan program ve diyet listesine erişebilmesi.
Spor yapmak için salona gittiği zaman yapabileceği programları elinde gereksiz kağıt taşımak yerine telefonundan bakıp halledebileceği bir web projesidir.
Ve üyelerimiz kendi boy ve kilo bilgisine göre vücut kitle indeksini hesaplayabilecektir.


Admin girişi için -> Kullanıcı Mail : (Admin)  Şifre :(Admin) giriniz.
Üye girişi için proje içine atılmış olan üyeler tablosunda ki herhangi bir üyenin bilgileri ile giriş yapabilirsiniz.
Projede database olarak mariadb kullanılmıştır.Proje içinde sql dosyası(kütüphane için eklenecek olan dosya) bulunmaktadır.

Proje için istenilen validatörler bean ve html tarafı olmak üzere iki farklı şekilde yapılmıştır. HTML validatörünü back_end dosyasında olcum formunda bulabilirsiniz.
Bean validatörleri ise back_end dosyasında Üye, Eğitim ve Eğitmen formlarda kullanılmıştır.

Projede 4 adet converter uygulanmıştır. Bunlardan 3 tanesi one to many ilişkisi için 1 tanesi ise many to many ilişkisi için kullanılmıştır.
Many to many ilişkisi üyeler ve eğitimler arasında alınan eğitim olarak uygulanmıştır.HTML tarafında bilgi işlemde alınan eğitim sütunlarında bu ilişkiyi görebilirsiniz.


Dosya yükleme kısmında dosyacontroller da uplaodto diyerek dosyanın yükleneceği konumu göstermiştik.Projenin dosya kısmı çalışması için o yolu kendi bilgisayarınıza göre değiştirmeniz gerekmektedir.


Şifremi unuttum kısmında çalışması için yazılan kodlar uyedao sınıfında bulunmaktadır.



