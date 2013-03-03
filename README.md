SQL Dosyası klasörün içindedir.

Sistem özellikleri;
1) Form üzerinden alınan kaydın toplam uzunluğunu 135 karakter belirledim. Çünkü arada boşluklar kullanıyoruz tweet'de.
2) Veri tabanında durum ve aktive olmak üzere 2 alan var.
    Durum = "Tweet'in gönderilip gönderilmediği bilgisi";
    Aktive = "Yöneticin onayı olup olmadığı";
    
3) tweetGonder.php twFonk.php içindeki fonksiyonu kullanarak. Tweet gönderim işini yapıyor.
    - Gönderimi yaparken veri tabanından gönderilmemiş, onaylı rastgele bir kayıt seçiyor.
    - Gönderimden sonra gönderildi listesine alınıp tekrar gönderilmiyor.
    
4) Admin paneline yonetici.php'den giriş yapabilirsiniz.
    - kullanıcı: admin , şifre : admin
    - Mesajları burdan onaylayabilirsiniz.
    
5) twitGonder.php hosting üzerinde (cron) zamanlandığı taktirde. Rastgele tweet gönderme işlemini yapacaktır.
