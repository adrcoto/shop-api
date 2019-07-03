/* ###################################### Create tables ###################################### */

/* ----------------------------------------Users table---------------------------------------- */
create table users(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    email varchar(50),
    status int,
    role int,
    forgot_code int
);

/* ----------------------------------------User Roles---------------------------------------- */
create table roles (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(10)
);

/* ----------------------------------------Items table---------------------------------------- */
create table items (
    item_id int primary key AUTO_INCREMENT,
    title varchar(60),
    description varchar(5000),
    price float,
    currency boolean,
    category int,
    location varchar(50),
    negotiable boolean,
    deactivated boolean,
    owner int
); 

/* ----------------------------------------ItemsImages table---------------------------------------- */
create table items_images(
    id int PRIMARY KEY AUTO_INCREMENT,
    item int,
    filename varchar(100)
);

/* ----------------------------------------Categories table---------------------------------------- */
create table categories (
    id int primary key AUTO_INCREMENT,
    name varchar(50)
);

/* ----------------------------------------Sub categories table---------------------------------------- */
create table sub_categories (
    id int PRIMARY KEY AUTO_INCREMENT,
    category int,
    name varchar(50)
);

/* ----------------------------------------Vehicles table---------------------------------------- */
create table vehicles(
    id int PRIMARY KEY AUTO_INCREMENT,
    item int unique,
    sub_category int,
    type int,
    manufacturer varchar(25),
    model varchar(25),
    body varchar(25),
    fuel_type varchar(25),
    manufacturer_year varchar(4),
    mileage varchar(15),
    status boolean,
    engine varchar(25),
    origin varchar(25),
    power varchar(25),
    gearbox varchar(25),
    drive varchar(25),
    emission_class varchar(25),
    color varchar(25),
    VIN varchar(17),
    pollution_tax boolean,
    damaged boolean,
    registered boolean,
    first_owner boolean,
    right_hand_drive boolean
);

/* ----------------------------------------Electronics table---------------------------------------- */
create table electronics (
    id int PRIMARY KEY AUTO_INCREMENT,
    item int unique,
    sub_category int,
    type int,
    manufacturer varchar(25),
   	model varchar(25),
    status boolean
);

/* ----------------------------------------Types table---------------------------------------- */
create table types (
    id int PRIMARY KEY AUTO_INCREMENT,
    category int,
    sub_category int,
    name varchar(35)
);



/* ###################################### Add relationship ###################################### */



/* ----------------------------------------Users table---------------------------------------- */
/* Users -> Roles */
alter table users add constraint fk_users_roles FOREIGN KEY (role) REFERENCES roles (id); 

/* ----------------------------------------User Roles---------------------------------------- */

/* ----------------------------------------Items table---------------------------------------- */
/* Items -> Categories */
alter table items add constraint fk_items_categories FOREIGN KEY (category) REFERENCES categories (id); 

/* Items -> Sub categories */
-- alter table items add constraint fk_items_sub_categories FOREIGN KEY (sub_category) REFERENCES sub_categories (id);

/* Items -> Users */
alter table items add constraint fk_items_users FOREIGN KEY (owner) REFERENCES users (id);

/* ----------------------------------------ItemsImages table---------------------------------------- */
/* Items images -> Items */
alter table items_images add constraint fk_items_image_items FOREIGN KEY (item) REFERENCES items (item_id);
/* ----------------------------------------Categories table---------------------------------------- */

/* ----------------------------------------Sub categories table---------------------------------------- */
/* Categories -> Sub categories*/
alter table sub_categories add constraint fk_sub_categories_categories FOREIGN KEY (category) REFERENCES categories (id);

/* ----------------------------------------Vehicles table---------------------------------------- */
/* Vehicles -> Items */
alter table vehicles add constraint fk_vehicles_items FOREIGN KEY (item) REFERENCES items (item_id);

/* Vehicles -> Categories */
-- alter table vehicles add constraint fk_vehicles_categories FOREIGN KEY (category) REFERENCES categories (id); 

/* Vehicles -> Sub categories */
alter table vehicles add constraint fk_vehicles_sub_categories FOREIGN KEY (sub_category) REFERENCES sub_categories (id); 

/* Vehicles -> Types */
alter table vehicles add constraint fk_vehicles_types FOREIGN KEY (type) REFERENCES types (id); 

/* ----------------------------------------Electronics table---------------------------------------- */
/* Electronics -> Items */
alter table electronics add constraint fk_electronics_items FOREIGN KEY (item) REFERENCES items (item_id);

/* Electronics -> Sub categories */
alter table electronics add constraint fk_electronics_sub_categories FOREIGN KEY (sub_category) REFERENCES sub_categories (id); 

/* Electronics -> Types */
alter table electronics add constraint fk_electronics_types FOREIGN KEY (type) REFERENCES types (id); 

/* ----------------------------------------Types table---------------------------------------- */



/* ###################################### Populate tables ###################################### */



/* ----------------------------------------User Roles---------------------------------------- */
insert into roles values(1, 'User');
insert into roles values(2, 'Admin');

/* ----------------------------------------Users table---------------------------------------- */
insert into users values (1, 'Administrator', 'admin@shop-api.com', 1, 2, 0);
insert into users values (2, 'Adrian Coto', 'adrcoto@yahoo.com', 1, 1, 0);
insert into users values (3, 'Gidu Liviu', 'liviu14@gmail.com', 1, 1, 0);
insert into users values (4, 'Brabete Florin','florin18@yahoo.com', 1, 1, 0);
insert into users values (5, 'Tuta Mihai', 'tuta_mihai14@yahoo.com', 1, 1, 0);
insert into users values (6, 'Dinca Mihai', 'Mihai_Parkour@yahoo.com', 1, 1, 0);
insert into users values (7, 'Lica Andrei', 'andreivalentin18@yahoo.com', 1, 1, 0);

/* ----------------------------------------Categories table---------------------------------------- */
insert into categories (name) values  ('Electronice-Electrocazine');
insert into categories (name) values  ('Auto-Moto-Nautica');
insert into categories (name) values  ('Imobiliare');

/* ----------------------------------------Sub categories table---------------------------------------- */
insert into sub_categories (category, name) values  (1, 'Laptop-PC-Periferice');
insert into sub_categories (category, name) values  (1, 'Telefoane');
insert into sub_categories (category, name) values  (1, 'Tablete-eReadere-Gadgeturi');
insert into sub_categories (category, name) values  (1, 'TV-Audio-Foto-Video');
insert into sub_categories (category, name) values  (1, 'Jocuri-Console');
insert into sub_categories (category, name) values  (1, 'Electrocasnice');
insert into sub_categories (category, name) values  (1, 'Echipamente de birou');

insert into sub_categories (category, name) values  (2, 'Autoturisme');
insert into sub_categories (category, name) values  (2, 'Motociclete-ATV-Scootere');
insert into sub_categories (category, name) values  (2, 'Camioane-Utilitare-Barci');
insert into sub_categories (category, name) values  (2, 'Piese-Accesorii-Consumabile');
insert into sub_categories (category, name) values  (2, 'Jante-Anvelope');

insert into sub_categories (category, name) values  (3, 'Garsoniere de inchiriat');
insert into sub_categories (category, name) values  (3, 'Garsoniere de cumparat');
insert into sub_categories (category, name) values  (3, 'Spatii de comerciale - Birouri');

/* ----------------------------------------Types table---------------------------------------- */
insert into types (category, sub_category, name) values (1, 1, 'Laptop');
insert into types (category, sub_category, name) values (1, 1, 'Sisteme PC');
insert into types (category, sub_category, name) values (1, 1, 'Monitoare');
insert into types (category, sub_category, name) values (1, 1, 'Mouse-Tastaturi');
insert into types (category, sub_category, name) values (1, 1, 'Modemuri-Routere');
insert into types (category, sub_category, name) values (1, 1, 'Componente-Accesorii');

insert into types (category, sub_category, name) values (1, 2, 'Telefoane-Mobile');
insert into types (category, sub_category, name) values (1, 2, 'Accesorii-GSM');

insert into types (category, sub_category, name) values (1, 3, 'Tablete');
insert into types (category, sub_category, name) values (1, 3, 'E-reader');
insert into types (category, sub_category, name) values (1, 3, 'Gadget-uri');


insert into types (category, sub_category, name) values (1, 4, 'Televizoare-Accesorii');
insert into types (category, sub_category, name) values (1, 4, 'Boxe-Sisteme audio');
insert into types (category, sub_category, name) values (1, 4, 'Playere audio-video');
insert into types (category, sub_category, name) values (1, 4, 'Aparate video si accesorii');
insert into types (category, sub_category, name) values (1, 4, 'Camere video si accesorii');
insert into types (category, sub_category, name) values (1, 4, 'Mixer-Amplificator-Receiver');

insert into types (category, sub_category, name) values (1, 5, 'Jocuri');
insert into types (category, sub_category, name) values (1, 5, 'Console');
insert into types (category, sub_category, name) values (1, 5, 'Accesorii');

insert into types (category, sub_category, name) values (1, 6, 'Electrocasnice');

insert into types (category, sub_category, name) values (1, 7, 'Imprimate-Copiatoare-Scannere');
insert into types (category, sub_category, name) values (1, 7, 'Telefoane fixe-Faxuri-centrale');
insert into types (category, sub_category, name) values (1, 7, 'Alte echipamente de birou');
insert into types (category, sub_category, name) values (1, 7, 'Papetarie');

insert into types (category, sub_category, name) values (2, 8, 'Autoturism');

insert into types (category, sub_category, name) values (2, 9, 'Motocicleta');
insert into types (category, sub_category, name) values (2, 9, 'ATV');
insert into types (category, sub_category, name) values (2, 9, 'Scooter');


insert into types (category, sub_category, name) values (2, 10, 'Autoutilitare');
insert into types (category, sub_category, name) values (2, 10, 'Camioane');
insert into types (category, sub_category, name) values (2, 10, 'Remorci');
insert into types (category, sub_category, name) values (2, 10, 'Rulote-Caravane');
insert into types (category, sub_category, name) values (2, 10, 'Barci');

insert into types (category, sub_category, name) values (2, 11, 'Piese auto');
insert into types (category, sub_category, name) values (2, 11, 'Piese moto');
insert into types (category, sub_category, name) values (2, 11, 'Accesorii');
insert into types (category, sub_category, name) values (2, 11, 'Consumabile');

insert into types (category, sub_category, name) values (2, 12, 'Jante');
insert into types (category, sub_category, name) values (2, 12, 'Anvelope');

/* ----------------------------------------Items table + category---------------------------------------- */
-- masina -> auto-moto-nautica -> autoturisme 
insert into items values (1, 'Porsche Cayenne 2018', 'Tot ce-i trebuie, full option!!!', 75000, 1, 2, 'Craiova', 0, 0, 1);
INSERT into vehicles VALUES(1, 1, 4, 26, 'Porsche', 'Cayenne', 'SUV', 'Diesel', '2018', '3500', 1, '3000', 'Germania', '300',  'Automata - PDK',
    '4x4', 'Euro VI', 'Rosu', 'H32156359kjhfdlk0', 1, 0, 1, 1, 0);

-- motocicleta -> auto-moto-nautica -> motocilete-atv-scootere 
insert into items values (2, 'Kawasaky Ninja R-2500', 'Ca noua', 5000, 1, 2, 'Craiova', 0, 0, 2);
INSERT into vehicles (item, sub_category, type, manufacturer, model, manufacturer_year, mileage, status, engine, power, drive, color, VIN, damaged
) VALUES(2, 5, 27, 'Kawasaky', 'Ninja R-2500', '2015', '5500', 1, '1600', '450', 'Lant', 'Rosu', 'H32156359kjhfdlk0', 0);

-- scooter -> auto-moto-nautica -> motocilete-atv-scootere 
insert into items values (3, 'Scooter Honda 750', 'Il vand pentru ca mai am altul', 1000, 0, 2, 'Craiova', 0, 0, 1);
INSERT into vehicles (item, sub_category, type, manufacturer, model, status, power, drive, color, damaged)
VALUES(3, 5, 29, 'Honda', '750', 1, '45', 'Lant', 'Negru', 1);


-- telefon mobil -> electrocasnice-electronice -> telefoane
insert into items values (4, 'Samsung Galaxy S10', 'E furat din UK', 3800, 0, 1, 'Craiova', 1, 0, 1);

-- placa video -> electrocasnice-electronice -> laptop-pc-periferice -> componente-accesorii
insert into items (title, description, price, currency, category, location, negotiable, deactivated, owner)
 values('Vand Placa Video AMD Radeon RX 580', 'Am cumparat-o doar ca sa o dau mai scumpa', 1280, 0, 1, 'Bals', 0, 0, 1);
INSERT into electronics (item, sub_category, type, manufacturer, model, status) VALUES (5, 1, 6, 'AMD', 'RX 580', 1);

-- placa video -> electrocasnice-electronice -> laptop-pc-periferice -> componente-accesorii
insert into items (title, description, price, currency, category, location, negotiable, deactivated, owner) 
values('Vand Procesor AMD Ryzen 5 2400G', 'Rupe, dar niciodata nu prinde turbo maxim pe toate nucleele', 750, 0, 1, 'Bals', 1, 0, 1);
INSERT into electronics (item, sub_category, type, manufacturer, model, status) VALUES (6, 1, 6, 'AMD', 'Ryzen 5 2400G', 1);

-- consola -> electrocasnice-electronice -> jocuri-console
insert into items (title, description, price, currency, category, location, negotiable, deactivated, owner) 
values('Playstation 4 PRO Nou - PS4 PRO 1TB', 'PS4 Pro 1TB
Accept orice fel de teste, consola este noua (a fost folosita maxim 10 ore in total) si vine cu o maneta si doua jocuri.
Mai multe detalii la telefon.', 1700, 0, 1, 'Sibiu', 1, 0, 1);
INSERT into electronics (item, sub_category, type, manufacturer, model, status) VALUES (7, 5, 19, 'Sony', 'Playstation 4 PRO', 1);
/* ###################################### Quering database ###################################### */



/* toate vehiculele */
select * from items, vehicles where items.category = 2 and vehicles.item = items.item_id;

/* electronice*/
select * from items, electronics where electronics.item = items.item_id;

/* atv-motociclete-scootere*/
select * from items, vehicles WHERE (vehicles.item = items.item_id  and (vehicles.type = 27 OR vehicles.type = 29 or vehicles.type = 28));
SELECT * FROM items, vehicles, electronics WHERE items.item_id = vehicles.item_id OR items.item_id = electronics.item_id GROUP BY items.updated_at;