# xploits
Exploits Research Center, Institut Teknologi Sepuluh Nopember Surabaya
Prototype.dev

Proses bisnis:
1. Setiap praktikan bisa membuat report dan upload dokumen laporan pentest.
2. Report yang telah dibuat akan divalidasi oleh asprak.
3. Dashboard web admin hanya menampilkan report yang telah divalidasi + dokumen yang terlampir.
4. Selanjutnya, web admin dapat membuat tiket berdasarkan report yang masuk.
5. Setiap tiket yang baru dibuat akan langsung berstatus “Open”.
6. tiket+dokumen hanya bisa dilihat oleh web admin dan LPTSI + sys admin.
7. tiket hanya bisa ditambahkan komentar oleh web admin dan  LPTSI
8. web admin hanya bisa melihat tiket miliknya sendiri, sedangkan LPTSI dan sys admin bisa melihat semua tiket
9. Hanya LPTSI yang bisa merubah status tiket dari “Open” menjadi “Closed”
10. Setiap user yang terdaftar via /register akan langsung dianggap sebagai praktikan
11. Hanya Sys Admin yang bisa menambahkan user sebagai LPTSI dan Web Admin
12. Hanya Sys Admin yang bisa melihat record users,reports,documents


Migration Table:
1. Users
    * id (integer)
    * role_id (integer)->from roles.id->default(0)
    * name (string)
    * email (string)->unique()
    * password (string)->bcrypt(‘password’)
    * rememberToken (string)
    * timestamps()
2. Roles
    * id (integer)
    * role_name (string)
    * timestamps()
3. Reports
    * id (integer)
    * user_id (integer)->from users.id->unsigned()
    * category_id (integer)->from categories.id->unsigned()
    * title (string)
    * description (text)
    * solutions (text)
    * isValidated (boolean)->default(0)
    * timestamps
4. Documents
    * id (integer)
    * report_id (integer)->from reports.id->unsigned
    * link (string)->unique()
    * timestamps
5. Tickets
    * id (integer)
    * user_id (integer)->from user.id->unsigned
    * category_id (integer)->from category.id->unsigned()
    * ticket_code (strtoupper(str_random(10))->unique()
    * priority (string)
    * title (string)
    * description (text)
    * status
    * timestamps()
6. Categories
    * id (integer)
    * category_name (string)->unique()
    * timestamps
7. Comments
    * id (integer)
    * ticket_code (integer)
    * user_id (integer)->from user.id
    * timestamps
8. Websites
    * id (integer)
    * user_id (integer)->from user.id->unsigned()
    * ticked_id (integer)->from ticket.id->unsigned()

