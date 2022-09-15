# Toko Produk
### Assalamualaikum wr.wb
### Website Toko Product Sederhana

# Pedoman
Pastikan sudah terinstall Composer pada laptop/pc kalian, karena project ini menggunakan Composer
API ini dibuat menggunakan: <br>
<b>Laravel</b>

### Package yang dipakai
- Datatable serverside yajra
- JQuery
- Validator.min.js  (Form Validation)
- doctrine/dbal


### Fitur
- Categories
- Variants
- Product
- Product Images

# Penggunaan

1. Gunakan terminal ketik perintah "composer install"
2. Buat database di mySQL dengan nama db_tokoproduk
3. Nyalakan migration laravel "php artisan migrate"
4. Nyalakan server laravel "php artisan serve"



BASE Url:
```bash
http://localhost:8000
```

## - Menampilkan seluruh data-data Product
```bash
http://localhost:8000/api/product
```
Contoh Response: 
```json
{
  "success": true,
  "message": "Success",
  "data": [
    {
      "id_product": 1,
      "kode_product": "P-000001",
      "id_categories": 3,
      "id_variants": 3,
      "foto": 1,
      "nama_product": "Kopi Kapal Api",
      "harga_product": 700,
      "created_at": "2022-09-15T06:28:26.000000Z",
      "updated_at": "2022-09-15T07:12:02.000000Z"
    }]
 }
```
## - Menampilkan data detail product 
```bash
http://localhost:8000/api/product/id_product
```
Note: id_product berupa number / integer

Contoh Response:
```json
{
"success": true,
  "message": "Success",
  "data": [
    {
      "id_product": 1,
      "kode_product": "P-000001",
      "id_categories": 3,
      "id_variants": 3,
      "foto": 1,
      "nama_product": "Kopi Kapal Api",
      "harga_product": 700,
      "created_at": "2022-09-15 06:28:09",
      "updated_at": "2022-09-15 06:28:09",
      "id_imgs": 3,
      "nama_imgs": "john-purakal-Z3eoqf-y9eY-unsplash.jpg",
      "nama_categories": "Minuman",
      "nama_variants": "Extra"
    }
  ]
}
```
### Jika ada kesalahan pada API atau ingin meminta saran bisa hubungi email: jenilutfifauzi18@gmail.com atau lewat issues pada repo ini.<br>Kurang lebihnya mohon maaf, Wassalamualaikum wr.wb
