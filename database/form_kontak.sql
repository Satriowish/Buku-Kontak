-- Database: form_kontak

-- Table structure for table tb_kontak
CREATE TABLE tb_kontak (
  id_kontak INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nama VARCHAR(150) NOT NULL,
  kontak VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL
);

-- Dumping data for table tb_kontak
INSERT INTO tb_kontak (nama, kontak, email) VALUES
('ryan', '082251607524', 'riansera515@gmail.com'),
('sera', '082245673322', 'riansera@gmail.com'),
('khadijah', '012345678890', 'dizahkamil@gmail.com'),
('pazrin', '0823424243', 'adiwiyatasmkn1ktb@gmail.com'),
('rafi jokowi', '08222222222', 'rafijokowi@gmail.com');
