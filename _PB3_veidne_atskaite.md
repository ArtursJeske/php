# Praktiskā darba atskaite

---

## 1. Vispārīgā informācija

- Vārds, Uzvārds: Artūrs Jeske
- Grupa:
- Praktiskā darba kods:PB3_PD17
- Datums:24.06.2026

---

## 2. Darba mērķis

* Šī praktiskā darba mērķis ir izveidot vienkāršu daudzlietotāju WEB sistēmu
---

## 3. Darba konteksts

* Izveidot lietotāju sistēmu, ar ielogošanos, lomām utt.

---

## 4. Darba izpilde

Apraksti galvenos soļus.

---

### 4.1 Uzdevums 1

#### Papildus uztaisīju Register.php , lai saprastu kā pareizi izmantot parole_hash.

* Aizņēma ļoti daudz laika, bet strādā.
* Reģistrējoties visi ir `user`, bet caur SQL adminam nomainīju lomu uz `admin`.

```php
 $stmt = $conn->prepare("INSERT INTO lietotaji (lietotajvards, parole_hash, loma) VALUES (?, ?, 'user')");
``` 

```text
MariaDB [Viesu_gramata]> Select * FROM lietotaji;
+----+---------------+--------------------------------------------------------------+-------+
| id | lietotajvards | parole_hash                                                  | loma  |
+----+---------------+--------------------------------------------------------------+-------+
|  1 | admin         | $2y$10$nxIkYtCZKX513/h53PyTge531k6CnVagutNY73ivBNmaeBfMPc/ua | admin |
|  2 | janis         | $2y$10$K8tOE1SO4HAhuS/Z9/vGou8sF/AF3e/9E5c9osEny5T5VgvloLR.i | user  |
+----+---------------+--------------------------------------------------------------+-------+
```

---

### 4.2 Uzdevums 2

* Izveidoju login lapu
* Saglabājas sesija
* Nepareizas paroles situācijā izlec paziņojums

---

### 4.1 Uzdevums 3

- Ko darīju:
- Kā realizēju:
- Rezultāts:

---

### 4.1 Uzdevums 4

- Ko darīju:
- Kā realizēju:
- Rezultāts:

---

### 4.1 Uzdevums 5

- Ko darīju:
- Kā realizēju:
- Rezultāts:

---

## 5. Rezultāts

Apraksti gala rezultātu:

- kas tika izveidots;
- kā tas izskatās / darbojas.

👉 Šī ir svarīgākā sadaļa

---

## 6. Problēmas un to risinājumi

Apraksti vismaz vienu:

- Problēma:
- Kā izpaudās:
- Kā atrisināju:
- Ko iemācījos:

---

## 7. Secinājumi

Atbildi:

- Ko jaunu iemācījos?
- Kas bija grūtākais?
- Kas izdevās vislabāk?
- Ko darītu citādi nākamreiz?

---

## 8. Pašvērtējums

| Kritērijs | Maks. punkti | Mani punkti |
|-----------|-------------|-------------|
| Uzdevumu izpilde |   |   |
| Tehniskais izpildījums |   |   |
| Struktūra |   |   |
| Dokumentācija |   |   |
| Atskaite |   |   |

Kopā: ___ / 100

---

## 9. Pielikumi

Norādi pievienotos failus:

- projekta faili
- diagrammas / ekrānšāviņi
- papildu materiāli
