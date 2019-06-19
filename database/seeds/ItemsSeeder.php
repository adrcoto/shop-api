<?php

use App\ItemsImage;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Vehicle;
use App\Electronic;
use App\ItemsType;
use App\Category;
use App\SubCategory;
use App\Item;

/**
 * Class ItemsSeeder
 */
class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $images = [
            'images/cayenne/cayenne.png',
            'images/cayenne/cayenne1.jpg',
            'images/cayenne/cayenne2.jpg',
        ];
        sleep(3);
        $this->addVehicleItem(
            'Porsche Cayenne 2012',
            "Tot ce-i trebuie, full option",
            75000,
            true,
            1,
            1,
            Category::AUTO_MOTO_NAUTICA,
            "Craiova",
            $images,
            SubCategory::AUTOTURISME,
            ItemsType::AUTOTURISM,
            "Porsche",
            "Cayenne",
            2012,
            3000,
            325,
            "Automata - PDK",
            "SUV",
            "Diesel",
            55000,
            "4x4",
            "Euro VI",
            "Negru",
            "Romania",
            "HGJLO34810LKJF195",
            true,
            true,
            false,
            true,
            false);
        $images = [
            'images/s10/1.jpg',
            'images/s10/2.jpg',
            'images/s10/3.jpg',
            'images/s10/4.jpg',
            'images/s10/5.jpg',
            'images/s10/6.jpg',
        ];
        sleep(2);
        //telefon
        $this->addElectronicItem('Samsung Galaxy S10', "E furat din UK",
            3600, false, 1, 0, Category::ELECTONICE_ELECTROCASNICE, "Bals",
            $images,
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_MOBILE,
            "Samsung", "Galaxy S10", 2018,
            false);
        $images = [
            'images/s9+/1.jpg',
            'images/s9+/2.jpg',
            'images/s9+/3.jpeg',
        ];
        sleep(1);
        //telefon
        $this->addElectronicItem('Samsung Galaxy S9+', "E furat din UK",
            2500, false, 0, 1,Category::ELECTONICE_ELECTROCASNICE, "Bucuresti",
            $images,
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_MOBILE,
            "Samsung", "Galaxy S9+", 2017,
            true);
        $images = [
            'images/congelator arctic/1.jpg',
            'images/congelator arctic/2.jpg',
            'images/congelator arctic/3.jpg',
        ];
        sleep(2);
        //congelator
        $this->addElectronicItem('Congelator 5 sertare arctic',
            "Vând congelator 5 sertare arctic stare foarte bună de funcționare curat și complet",
            3600, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Constanta",
            $images,
            SubCategory::ELECTROCASNICE,
            ItemsType::APARATE_FRIGORIFICE,
            "Artic", "", 0,
            false);
        $images = [
            'images/nikon/1.jpg',
            'images/nikon/2.jpg',
            'images/nikon/3.jpg',
            'images/nikon/4.jpg',
            'images/nikon/5.jpg',
            'images/nikon/6.jpg',
            'images/nikon/7.jpg',
        ];
        sleep(1);
        $this->addElectronicItem('Nikon D7100 + 2 obiective',
            "Nikon folosit in regim hobby.
Vand Nikon D7.100 plus diverse accesorii in stare perfecta de functionare compus din:
body Nikon 7.100
Sigma 17-50 mm DSLR F2.8 EX HSM OS Montura Nikon DX
Nikkor 35 mm f/1.8
Se vinde cu toate accesoriile originale: curea, 2 baterii, incarcator si capac frontal.
Nu se vinde separat
Pret 3.200 lei
Aparatul se poate vedea in Miercurea Ciuc. Accept orice test.Predare personala in Miercurea Ciuc.
Trimit si in tara cu verificare colet.",
            3200, false, 1, 0, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti",
            $images,
            SubCategory::TV_AUDIO_FOTO_VIDEO,
            ItemsType::APARATE_FOTO_SI_ACCESORII,
            "Nikon", "", 2017,
            true);
        $images = [
            'images/zte/1.jpg',
            'images/zte/2.jpg',
            'images/zte/3.jpg',
        ];
        sleep(3);
        //dezmembrare wot is this
        $this->addElectronicItem('Dezmembrez Zte Grand X In',
            "Dezmembrez Zte Grand X In
Placa de baza -80 Lei
Baterie-30 Lei
Capac baterie-25Lei
Rama-25 Lei
Camera spate-20 Lei
Garantie
Montaj 30 lei
Transport 25 lei
Suntem firma, nu negociem pretul si nu acceptam schimburi!!",
            50, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
            $images,
            SubCategory::TELEFOANE,
            ItemsType::ACCESORII_GSM,
            "", "", 0,
            true);
        $images = [
            'images/husa/1.jpg',
            'images/husa/2.jpg',
            'images/husa/3.jpg',
            'images/husa/4.jpg',
            'images/husa/5.jpg',
            'images/husa/6.jpg',
            'images/husa/7.jpg',
            'images/husa/8.jpg',
        ];
        sleep(1);
        //husa
        $this->addElectronicItem('Set husa slim transparenta TPU + folie sticla Hoco iPhone X',
            'COD PRODUS: IPHONE X - HOCO SET HUSA + FOLIE
           Marca HOCO este un brand international de renume, care creaza huse de top de foarte buna calitate. Aceasta husa este realizata din material TPU premium importat din Germania si produs in Hong Kong',
            89, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
            $images,
            SubCategory::TELEFOANE,
            ItemsType::ACCESORII_GSM,
            "", "", 0,
            false);
        $images = [
            'images/dacia1310/1.jpg',
            'images/dacia1310/2.jpg',
        ];
        sleep(2);
        //dacia 1310
        $this->addVehicleItem('Dacia 1310 cu I.T.P. valabil pentru tichet rabla 2019', "Merge ca atunci cand am luat-o",
            1800, false, 1, 1,Category::AUTO_MOTO_NAUTICA, "Craiova",
            $images,
            SubCategory::AUTOTURISME,
            ItemsType::AUTOTURISM,
            "Dacia", "1310", 1990,
            1.2, 65, "Manuala",
            "Berlina", "Benzina", 350000,
            "Fata", "Euro", "Galben", "Romania",
            "HGJLO348HHHKJF195", true, false, true,
            false, false);
        $images = [
            'images/rama/1.jpg',
        ];
        sleep(2);
        //rama allview
        $this->addElectronicItem('Rama mijloc allview x4 soul mini',
            "Rama mijloc allview x4 soul mini Montaj 30 lei Transport in tara 20lei",
            30, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
            $images,
            SubCategory::TELEFOANE,
            ItemsType::ACCESORII_GSM,
            "Allview", "X4 Soul Mini", 0,
            false);


        $images = [
            'images/ford focus/1.jpg',
            'images/ford focus/2.jpg',
            'images/ford focus/3.jpg',
            'images/ford focus/4.jpg',
            'images/ford focus/5.jpg',
            'images/ford focus/6.jpg',
            'images/ford focus/7.jpg',
        ];
        sleep(2);
        //ford focus
        $this->addVehicleItem('Ford Focus 2013', "ABS
CD
Geamuri fata electrice
Servodirectie
Bare longitudinale acoperis cromate
Faruri automate
Geamuri laterale spate fumurii
Incalzire auxiliara
Jante din aliaj usor
Oglinda retrovizoare interioara electrocromatica
Oglinzi retrovizoare incalzite
Proiectoare ceata
Stergatoare parbriz automate
Airbag-uri frontale
Computer de bord
Inchidere centralizata
Aer conditionat doua zone
Bluetooth
Faruri Xenon
Geamuri spate electrice
Interior din velur
Limitator de viteza
Oglinzi retrovizoare ajustabile electric
Parbriz incalzit
Scaune fata incalzite
Controlul tractiunii (ASR)
Airbag-uri laterale fata
Controlul stabilitatii (ESP)
Radio
Airbag-uri laterale spate
Comenzi volan
Geamuri cu tenta
Head-up display
Intrare auxiliara
Lumini de zi (LED)
Oglinzi retrovizoare exterioare electrocromatice
Pilot automat
Senzori parcare fata-spate",
            8600, true,  1, 1,Category::AUTO_MOTO_NAUTICA, "Sintesti, Bucuresti-Ilfov",
            $images,
            SubCategory::AUTOTURISME,
            ItemsType::AUTOTURISM,
            "Ford", "Focus MK3", 1990,
            1997, 163, "Automata",
            "Break", "Diesel", 105000,
            "Fata", "Euro 5", "Negru", "Germania",
            "HGJLO348LFVKJF195", true, true, false,
            true, false);


//    *****************************************************************************


        $images = [
            'images/golf vii/1.jpg',
            'images/golf vii/2.jpg',
            'images/golf vii/3.jpg',
        ];
        sleep(2);
        //golf
        $this->addVehicleItem('Volswagen Golf VII', "ABS
 -In garantie pana in Mai 2022 , pana la 100,000km.
 -Cumparat de la dealer VW
 -Fara accident
 -Anvelope \" All Season\" in conditie excelenta
 -Kilometraj: 39,000km
 -Facelift Automat, Navi ACC
 -Faruri de ceață și lumina de viraj
 -Oglinzi exterioare reglabile electronic, cu balamale, incalzire, iluminat ambiental, coborârea oglinzii pasagerului (parcare)
 -Sistem de curățare a farurilor
 -Sistem de navigatie “Discover Media” cu Touchscreen TFT
 -Aer conditionat “Air Care Climatronic” cu 2 zone de control temperatura si filtru alergeni
 -Control automat al distanței ACC “Stop & Go”, inclusiv limitator de viteza
 -Interfață telefonică în colaborare cu Car-Net sau sistem de navigație
 -Incalzire in scaunele din față
 -Senzor de ploaie
 -Filtrele de spălare a parbrizului sunt încălzite automat în față
 -Geamurile laterale din spate și geamurile din spate se întunecă, absorbind 65% lumină
 -Lumini de condus automate, cu lumini de funcționare în timpul zilei “Leaving Home” si “ Coming Home”, Controlul fascicolului principal “Light Assist”.
 -Interfață USB, compatibil iPod / iPhone, inclusiv mufa Multimedia AUX-IN
 -Oglinda interioară se estompează automat
 -Car-Net “Guide & Inform”
 -“Volkswagen Media Control” si conectare aplicatii “ App-Connect\"
 -Lampă de avertizare pentru nivelul apei de spălare
 -Pachet de lumina si vedere
 -Pachet sunset “SOUND”
 -“Guide & Inform” cu termen peste 1 an
 -Antena “Diversity” pentru receptia FM
 -Sistemul de monitorizare a mediului “ Front Assist”, City - franare de urgenta ( pentru control automat al distanței până la 210 km /h)
 8 difuzoare
 -vehicul pentru nefumători
 -Pretul unei masini noi acceasi marca si model, 33,213 euro

 VIN: WVWZZZAUZHP785580
 Număr de locuri: 3 - 6
 Număr uşi: 4 sau 5
 Airbag: Airbag frontal, lateral şi altele",
            15500, true, 1, 0,Category::AUTO_MOTO_NAUTICA, "Sibiu, Sibiu",
            $images,
            SubCategory::AUTOTURISME,
            ItemsType::AUTOTURISM,
            "Volkswagen", "Golf VII", 2017,
            1598, 82, "Automata",
            "Break", "Diesel", 39000,
            "Fata", "Euro 6", "Alb", "Germania",
            "WVWZZZAUZHP785580", true, true, false,
            true, false);


        $images = [
            'images/pc gaming/1.jpg',
            'images/pc gaming/2.jpg',
            'images/pc gaming/3.jpg',
        ];
        sleep(2);
        $this->addElectronicItem('Calculator Gaming Msi X470 Amd Ryzen 5 1600X Nou', "Pc Gaming Nou - toate componentele beneficiaza de garantie 2-3 ani la eMag , Pc Garage si Cel.ro.


Tastatura + Mouse RGB Bonus

Optional +450 lei : Monitor gaming LED TN Asus 23.6\", Full HD, 1 ms, FreeSync, DisplayPort, Negru, VP247QG - Se vinde si separat cu 450 lei 

Componente

Placa de baza MSI X470 GAMING PLUS, Socket AM4 MysticLight Rgb - Pret :700 Lei https://www.pcgarage.ro/placi-de-baza/msi/x470-gaming-plus/

Procesor AMD Ryzen 5 1600X, 3.6 GHz, 16MB, Socket AM4 - Pret :690 Lei https://www.emag.ro/procesor-amd-ryzen-5-1600x-3-6-ghz-16mb-socket-am4-yd160xbcaewof/pd/D93Z57BBM/?--&cmpid=79111&gclid=CjwKCAiAiJPkBRAuEiwAEDXZZRJHw9NfvRKticosfLn9VS6WE1sk-POx9eOKq8dMA9yUPFnLAPm1khoCUL0QAvD_BwE

Cooler procesor AMD Wraith Max, RGB LED https://www.pcgarage.ro/coolere/amd/wraith-max-rgb-led/

Memorie desktop Kingmax Zeus Dragon RGB 16 GB, 2x8 GB DDR4, 3000 Mhz,(3400) 1,35v CL16 Asus Aura Sync - Pret :700 Lei https://www.emag.ro/memorie-desktop-kingmax-zeus-dragon-rgb-8-gb-ddr4-3000-mhz-1-35v-cl16-gzng-ddr4-8g3000zd/pd/DJ70QJBBM/

Solid-State Drive (SSD) Samsung 860 EVO, 500GB, SATA III, M.2 - Pret :420 Lei https://www.emag.ro/solid-state-drive-ssd-samsung-860-evo-500gb-sata-iii-m-2-mz-n6e500bw/pd/DDY6L9BBM/

Solid State Drive (SSD) Samsung 850 EVO, 2.5\", 120GB, SATA III - Pret :200 Lei https://www.germanos.ro/samsung-ssd-120gb-850-evo--88245/?categoryId=1997

Placa video Sapphire Radeon RX 570 PULSE, 4GB GDDR5, 256-bit - Pret :800 Lei https://www.emag.ro/placa-video-sapphire-radeon-rx-570-pulse-4gb-gddr5-256-bit-11266-04-20g/pd/DJYGDDBBM/

Ventilator / radiator Floston AURORA RGB 3 fan kit -telecomanda - Pret :120 Lei https://www.pcgarage.ro/ventilatoare-radiatoare/floston/aurora-rgb-3-fan-kit/

Carcasa Inter-Tech C-III Saphir Black Dimensiuni (H x D x W)450 x 435 x 205 mm
Panou lateral transparent tempered glass, Iluminare LED Multicolor - Pret :220 Lei http://www.cel.ro/carcase/carcasa-inter_tech-c_iii-saphir-black-mid-tower-pMCI1MDEtMw-l/

Sursa nJoy Titan 600, 600W Real Power, PFC Activ, 80 Plus Bronze - Pret :200 lei https://www.emag.ro/sursa-njoy-titan-600-600w-real-power-pfc-activ-80-plus-bronze-pwps-060a02t-bu01b/pd/D4XBBMBBM/

Optional: Monitor gaming LED TN Asus 23.6\", Full HD, 1 ms, FreeSync, DisplayPort, Negru, VP247QG - Pret :450 Lei https://www.emag.ro/monitor-gaming-led-tn-asus-23-6-full-hd-1-ms-freesync-displayport-negru-vp247qg/pd/DDB4KHBBM/

BONUS

Tastatura Gaming Marvo KG919 Mecanica, RGB LED - Pret :160 lei https://www.emag.ro/tastatura-gaming-marvo-led-kg919/pd/DLQL27BBM/

Mouse gaming RGB ADATA XPG INFAREX M10 + Mousepad gaming RGB INFAREX R10 - Pret :125 Lei https://www.emag.ro/mouse-gaming-rgb-adata-xpg-infarex-m10-mousepad-gaming-rgb-infarex-r10-infarex-m10-infarex-r10/pd/DS633JBBM/

Se accepta orice fel de teste/ proba pe raza judetului Brasov.

",
            4000, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Bals",
            $images,
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::SISTEME_PC,
            "", "", 0,
            true);


        sleep(2);
        $this->addElectronicItem('Monitor Led 23" ASUS VC239H FHD IPS 16:9 1920*1080',
            "Monitor ASUS VC239H
        cu Emisii De Lumina Albastra Ultra-Reduse - 23 FHD 1920x1080
        IPS, Eliminare a Tremurului de Imagine
        Afișaj cu tehnologie In-Plane Switching IPS, cu sistem de iluminare LED într-un format compact cu margini ultra-subțiri
        Funcții avansate de protecție a ochilor cu Filtru de Reducere a Emisiilor de Lumină Albastră și Tehnologie de Eliminare a Tremurului de Imagine
        Conector pentru montare pe perete încorporat, suportând multiple scenarii de utilizare

        Monitorul este nou, dar desigilat cu toate aceesoriile+ cablu HMDI 1,8m CADOU
        -are factura si garantie valabila pana la data de 08,01,2020
        Pentru mai multe detalii accesati linkul catre producator
        https://www.asus.com/ro/Monitors/VC239H/

        NU fac schimburi
        Livrare personala in Bucuresti.
        Trimit si in alte localitati prin curierat rapid.",
            500, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Craiova",
            ['images/monitor/1.jpg',
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::MONITOARE,
            "Samsung", "ASUS VC239H", 2012,
            true);


        sleep(2);
        $this->addElectronicItem('Consola PlayStation 4 (PS4) + 13 jocuri',
            "Pachetul contine urmatoarele:
       -PS4
       -1 Controller
       -cablu HDMI
       -cablu USB
       -cablu pentru putere

       Jocuri pe CD:
       -Lego World
       -Ratchet & Clank
       -Cyberdimension Neptunia: 4 Goddesses Online
       -God of War 3 Remastered
       -Dirt Rally
       -Plants vs. Zombies: Garden Warfare 2
       -Dragonball Xenoverse 2

       Jocuri digitale:
       -Dragonball FighterZ
       -Terraria
       -Grand Theft Auto 5
       -Megadimension Neptunia VII
       -One Piece: Burning Blood
       -Rocket League",
            1250, false, 1, 1, Category::ELECTONICE_ELECTROCASNICE, "Piatra Neamt, Neamt",
            ['images/ps4/1.jpg',
                "images/ps4/2.jpg",
            ],
            SubCategory::JOCURI_CONSOLE,
            ItemsType::CONSOLE,
            "Sony", "PlaysStation 4", 2018,
            true);

        sleep(2);
        $this->addElectronicItem('Frigider mic',
            "Frigider mic de 80 cm adus din Germania în stare perfecta de funcționare",
            350, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Resita, Caras-Severin",
            ['images/frigider/1.jpg',
                "images/frigider/2.jpg",
            ],
            SubCategory::ELECTROCASNICE,
            ItemsType::APARATE_FRIGORIFICE,
            "", "", 1998,
            true);


        sleep(2);
        $this->addElectronicItem('Mașină de spălat rufe Siemens. Capacitate 5 - 8 kg.',
            "Magazin electrocasnice - import Germania.
        Mașină de spălat automată Siemens. diferite modele.
        Capacitate cuvă 5 - 8 kg.
        Viteza de stoarcere 14oo rpm.
        Programe: bumbac, sintetice, mixt, program scurt 30 min.
        Pret de vânzare de la 5oo lei.
        Garanție 12 luni , transport la domiciliu in Tm / contracost asigur transport si in alte localități.
        La cerere asiguram si montajul
        Pentru produsul vechi vă oferim intre 5o - 2oo lei.

        Adresa : Str. C- tin Brâncoveanu Nr 123 / Timisoara.

        ORAR :
        L - V = 09.00 – 18.00.
        S = 09.00 – 14.00.",
            550, false, 1, 0, Category::ELECTONICE_ELECTROCASNICE, "Timisoara, Timis",
            ['images/spalat/1.jpg',
                "images/spalat/2.jpg",
            ],
            SubCategory::ELECTROCASNICE,
            ItemsType::MASINI_DE_SPALAT,
            "", "", 2005,
            true);
        sleep(2);
        $this->addElectronicItem('Masina de cusut Singer.',
            "Vand masina de cusut Singer functionala.",
            1000, false, 1, 0, Category::ELECTONICE_ELECTROCASNICE, "Giurgiu, Giurgiu",
            ['images/cusut/1.jpg',
                "images/cusut/2.jpg",
            ],
            SubCategory::ELECTROCASNICE,
            ItemsType::MASINI_DE_CUSUT,
            "Singer", "", 1970,
            true);


        sleep(2);
        $this->addElectronicItem('Tableta APPLE iPad Pro, 10.5", 256GB, 4GB RAM, Wi-Fi + 4G.',
            "Tableta APPLE iPad Pro, 10.5\", 256GB, 4GB RAM, Wi-Fi + 4G, Space Gray

Specificații : 

Ecran
Tip ecran
Retina Display
Alte detalii
Ecran Multitouch cu retroiluminare LED,Tehnologie ProMotion,Ecran cu gama larga de culori (P3),Ecran True Tone,Ecran complet laminat,
Dimensiune ecran (inch)
10.5
Rezolutie (pixeli)
2224 x 1668
Procesor
Tip procesor
Quad Core
Producator procesor
Apple
Model procesor
A10X
Frecventa procesor (GHz)
2.3
Memorie
Capacitate RAM
4 GB
Capacitate stocare
256 GB
Multimedia
Camera principala
12 MP, ƒ/1,8,Zoom digital de pana la 5x,Stabilizare optica a imaginii,Obiectiv cu sase elemente,Blit True Tone Quad-LED,Panorama (pana la 63 de megapixeli),Protectie a obiectivului din cristal de safir,Senzor BSI,Filtru IR hibrid,Focalizare auto
Camera secundara
7 MP,Inregistrare video HD de 1080p,Retina Flash, ƒ/2,2,Captare in gama larga de culori pentru fotografii si Live Photos,HDR automat,Senzor BSI,Detectare corporala si faciala,Stabilizare automata a imaginii,Mod rafala,Control expunere,Mod temporizator
Difuzoare
Da
Microfon
Da
Tehnologie audio
Sistem audio cu patru difuzoare
Comunicatii
Conectivitate
Wi-Fi si 4G
SIM
Da
Tip
nano SIM
GPS
A-GPS, GLONASS
Wireless
Wi Fi (802.11a/b/g/n/ac); banda duala (2,4 GHz si 5 GHz); HT80 cu MIMO
Bluetooth
4.2
Porturi
Jack 3.5 mm
Da
Format suportat
Audio
AAC, Protected AAC (from iTunes Store), HE-AAC, MP3 , MP3 VBR, Audible (formats 2, 3, 4, Audible Enhanced Audio, AAX, AAX+), Apple Lossless, AIFF, WAV
Video
H.264, AAC-LC, MPEG-4, M-JPEG,
Alte formate
doc si .docx; .htm si .html; .key (Keynote); .numbers (Numbers); .pages (Pages); .pdf; .ppt si .pptx (Microsoft PowerPoint); .txt; .rtf (rich text format); .vcf (contact information); .xls si .xlsx (Microsoft Excel); .zip; .ics
Alimentare
Autonomie (h)
Pana la 10 ore de navigare pe internet cu Wi Fi, vizionare filme sau redare muzica
Software
Aplicatii
App Store, Clock, FaceTime, Game Center, iBooks, iTunes, Mail, Maps, Messages, Music, Notes, Photos, Safari
Informatii suplimentare
Continut pachet
Incarcator, cablu lightning
Senzori
Accelerometru, Ambient light sensor, Barometru, Giroscop, Senzor de amprenta, Touch ID
Altele
Greutate (Kg)
0.469
Culoare
Space gray - negru

Detalii la telefon ! 
Trimit in țara cu verificare colet ! 
Ofer și cer seriozitate maxima !",
            2800, false, 1, 0, Category::ELECTONICE_ELECTROCASNICE, "Targu Jiu, Gorj",
            ['images/apple/1.jpg',
                "images/apple/2.jpg",
                "images/apple/3.jpg",
            ],
            SubCategory::TABLETE_EREADERE_GADGETURI,
            ItemsType::TABLETE,
            "Apple", " iPad Pro", 2016,
            true);


        sleep(2);
        $this->addElectronicItem('Evolio EvoBook 3 eReader',
            "Arata foarte bine, fara zgarieturi. Are probleme cu display - ul... oricum , se vinde ca defecta.

Specificatii
CARACTERISTICI GENERALE

Model	Evobook 3
ECRAN

Tehnologie ecran	E-Ink
Diagonala	6 inch
Rezolutie	800 x 600
PROCESOR

Model procesor	Allwinner E200
Frecventa	380 MHz
MEMORIE

Memorie interna	4 GB
RAM	64 MB
Slot memorie	MicroSD
Capacitate maxima memorie	16 GB
FORMATE SUPORTATE

Text	CHM, DJVU, DOC, Epub(DRM), FB2, FB2.ZIP, HTM, HTML, MOBI, PDF, PDF(DRM), PRC, RTF, TCR, TXT
Foto	BMP, GIF, JPG, PNG
CONECTIVITATE

USB	MicroUSB v2.0
BATERIE

Timp de functionare	Pana la 10.000 de pagini
Tip	Li-Polymer 1500 mAh
CARACTERISTICI GENERALE

Dimensiuni (W x H x D)	160.3 x 111.5 x 8 mm
Culoare	Negru
Greutate	189 g.",
            100, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti, Bucuresti-Ilfov",
            ['images/er/1.jpg',
            ],
            SubCategory::TABLETE_EREADERE_GADGETURI,
            ItemsType::eREADER,
            "Evolio", "EvoBook 3 ", 2015,
            true);


        sleep(2);
        $this->addElectronicItem('Laptop Acer Aspire V3-572G, I5-5200G, 2.20 GHz',
            "Laptop Acer Aspire V3-572G, I5-5200G, 2.20 GHz - Negociabil

L-am achizitionat in 2015 si de atunci mi-a fost cel mai bun prieten. Din cauza utilizarii, partea din stanga (unde sustineam palma) este un pic uzat. Veti vedea in poza. Altfel, functioneaza perfect. Am rulat atat Linux, cat si Windows pe el fara probleme.
Intrucat am facut recent un upgrade, nu imi mai foloseste si de aceea e la vanzare",
            1400, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti, Bucuresti-Ilfov",
            ['images/lap/1.jpg',
                "images/lap/2.jpg",
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::LAPTOP,
            "Acer", " Aspire V3-572G", 2015,
            true);


        sleep(2);
        $this->addElectronicItem('Body Canon 5D mark ii + 4 carduri CF + o baterie replace',
            "- specificatiile tehnice se pot gasi la link-ul de mai jos:
http://web.canon.jp/imaging/eosd/eos5dm2/specifications.html
- cu o baterie originala si o baterie replica de 2100mAh.
- de asemenea se ofera si 4 carduri CF, 2x32gb, 1x16gb, 1x8gb - se pot vedea in poze.
- aparatul arata foarte bine 9/10, functioneaza 10/10,
- a fost folosit exclusiv pentru video, de aceea are aproximativ 60k shutter.
- puteti vedea un clip filmat cu acest aparat + Samyang 35mm F1.4
( https://vimeo.com/243660123 )
- il vand deoarece, am trecut la Panasonic si nu il mai folosesc de 1an..",
            1900, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Brasov, Brasov",
            ['images/camera/1.jpg',
                "images/camera/2.jpg",
            ],
            SubCategory::TV_AUDIO_FOTO_VIDEO,
            ItemsType::CAMERE_VIDEO_SI_ACCESORII,
            " Canon", "5D mark II", 2012,
            true);


        sleep(2);
        $this->addElectronicItem('Iphone 7 Jet Black, impecabil Ca Nou, 128 GB.',
            "Vând iPhone 7 Jet Black, 128 GB, 
Neverlocked, Full Box
Telefon Personal, impecabil
Telefon 10/10 
Folie Nouă și Husa Cadou.",
            1190, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Oradea, Bihor",
            ['images/iph/1.jpg',
                "images/iph/2.jpg",
            ],
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_MOBILE,
            "Apple", "Iphone 7", 2016,
            true);

        sleep(2);
        $this->addElectronicItem('Obiectiv Canon EF-S 18-135mm f/3.5-5.6 IS Nano USM',
            "Se vinde obiectiv putin folosit stare perfecta 10/10
Pretul in magazinele se specialitate este de 2500 lei.
Motor focus silentios ideal pentru inregistrari video
Tehnologia Nano USM permite focalizarea rapida
Constructie obiectiv (elemente/grupuri): 16/12
Nr. lamele diafragma: 7
Distanta minima focalizare: 0.39m
Stabilizator de imagine (trepte): 4.0
Mecanism de actionare focalizare automata: USM
Diametru filtru: 67mm
Greutate: 515g",
            1990, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Arad, Arad",
            ['images/ob/1.jpg',
                "images/ob/2.jpg",
            ],
            SubCategory::TV_AUDIO_FOTO_VIDEO,
            ItemsType::CAMERE_VIDEO_SI_ACCESORII,
            "Canon", " EF-S", 2017,
            true);


        sleep(2);
        $this->addElectronicItem('Dezmembrez Laptop Toshiba Satellite C870 C875',
            "Dezmembrez Laptop Toshiba Satellite C870.

TOSHIBA SATELLITE C870-12P, C870-12Q, C870-138, C870-139, C870-14T, C870-15F, C875-10F H000041620

Piese disponibile:
Rama Ecran - 30 lei
Placa baza functionala ( Procesor ) -180 lei
Palmrest cu Touchpad - 90 lei
Bootomcase - 45 lei
Capac memorii - 30 lei
Unitate Optica - 50 lei
WiFi - 30 lei
Cooler - 30 lei
Radiator - 40 lei
WebCam - 30 lei
Cablu ecran (LVDS) - 60 lei
Diverse Cabluri si mufe - depinde.",
            45, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Craiova, Dolj",
            ['images/dezmb/1.jpg',
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::LAPTOP,
            "Toshiba ", "C870 ", 2009,
            true);


        sleep(2);
        $this->addElectronicItem('CPU Procesor AMD Athlon X2 5000',
            "Procesor AMD Athlon 64 X2 5000+, Dual Core, 2,6GHz, Cache 2MB,

        Am si alte tipuri de procesoare socket AM2 AM3
        ADX2200CK22GM
        ADX2400CK23G
        ADO4400IAA5DO
        ADO4600IAA5CU
        ADAFX60DAA6CD
        ADH1620IAA5DH
        ADH1640IAA5DH
        ADG2650IAV4DP
        Etc.....

        Procesoarele sunt testate si sunt in stare buna de functionare!",
            40, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Bals, Olt",
            ['images/cpu/1.jpg',
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::COMPONENTE_ACCESORII,
            "AmD", "Athlon X2", 2008,
            true);


        sleep(2);
        $this->addElectronicItem('Telefon fix / Obiect de decor / Model vintage retro 2',
            "Telefon fix cu aspect vintage, perfect functional (ii este necesar un cablu de telefon fix, nu necesita alimentare la priza).

Functii de baza (caller id, redial, memorie pentru agenda telefonica).

Baza telefonului: lemn si metal
Receptor: lemn si plastic

Produsul este nou, sigilat.

Pretul NU este negociabil.",
            180, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti, Bucuresti-Ilfov",
            ['images/old/1.jpg',
                "images/old/2.jpg",
            ],
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_FIXE_FAXURI_CENTRALE,
            "Apple Beta", "Vintage Retro 2", 1970,
            true);


        sleep(2);
        $this->addElectronicItem('Iphone 6s rose gold',
            "Iphone 6s rose gold neverlock, impecabil.
Ofer cadou carcasa originala apple.
Telefonul a fost tinut mereu in husa si cu folie de sticla.

",
            1000, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Baia Mare, Maramures",
            ['images/6s/1.jpg',
                "images/6s/2.jpg",
            ],
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_MOBILE,
            "Apple", "Iphone 6s", 2015,
            true);

        sleep(2);
        $this->addElectronicItem('Baterie laptop comp. Acer AS10D31 AS10D41 AS10D',
            "Baterie laptop compatibila Acer AS10D31 AS10D3E AS10D41 AS10D51 AS10D61 AS10D71 este compatibil cu urm:
Acer Aspire Series: Aspire 4250, 4251, 4252, 4253, 4333, 4339, 4349, 4551, 4552 4560, 4625, 4733, 4738, 4739, 4741, 4743, 4750, 4752, 4755, 4771, 5250, 5251, 5252 5253, 5333, 5336 5349, 5551 5552, 5733, 5736 5741, 5742, 5749, 5750, 5755, 7251, 7551G 7552G AS7552G, 7560, 7741 7750, 7751, E1-531, E1-571, V3-571, V3-731G, V3-771G, V3-772G, V3-531, E1-471, E1-772, E1-731G, E1-521, V3-7710 
Gama Acer TravelMate Series: TravelMate 4370, 4740Z , 4750, 5335, 5340G, 5542, 5735, 5740 5742 5744, 5760, 6495, 7740, 7750, 8472, 8473, 8572, 8573, TimelineX 6495, TimelineX 8473, TimelineX 8573
Gama eMachines Series: eMachines D530 , D640 , D640G , D642 , D728 , D730 , D732 , E440 , E442 , E530 , E640 , E642 , E650 , E730 , E732 , G440 , G530 , G640 , G730 , 
Gama Gateway Series: Gateway NS51 , NV47H , NV49 , NV50A , NV51B , NV51M , NV55, NV55S02u , NV55S03u , NV55S04u , NV55S05u , NV57H , NV59C , NV73A , NV75S , NV77H , NV79C , P5WS0
Gama Packard Bell EasyNote Series: EasyNote TM, LM81, LM82, LM83, LM85, LM86, LM87, LM94, LM98, LS11, LS13, NM85, NM86, NM87, NM88, NM89, NM98, NS11, NS44, PEW92, TK, TM01, TM80, TM81, TM82, TM83, TM85, TM86, TM87, TM89, TM94, TS11, TS13, TS44,
Este posibil ca aceasta baterie sa fie compatibila si cu alte modele de laptop Acer ce nu sunt listate mai sus.
Acest acumulator poate inlocui cu succes urmatoarele PN-uri:
3ICR19/66-2, 934T2078F, AS10Dxx, BT.00603.111, BT.00604.049, BT.00606.008, BT.00607.125, BT.00607.127, LC.BTP00.123, LC.BTP00.127 etc...61 AS10D71
Acc pt Laptop Acer AS10Dxx, este compatibil cu urm modele:
Aspire 4250, 4251, 4252, 4253, 4333, 4339, 4349, 4551, 4552 4560, 4625, 4733, 4733G,4738, 4739, 4741, 4743, 4755, 4771, 5250, 5251 AS5251, 5252 AS5252, 5253, 5333, 5336 AS5336, 5349, 5551 AS5551, AS5551G, 5552, 5552G, 5733, 5733Z, 5736 5741, 5742 , 5749, , 5750, 5755, 7251, 7551 , 7552G , 7560, 7741 , 7750, 7751, E1-531, E1-571, V3-571, V3-731G, V3-771G-9875, V3-772G, E1-772G, V3-531, E1-471, E1-772, E1-731G, E1-521, V3-7710 
Gama Acer TravelMate Series: TravelMate 4370, 4740 TM4740, 4750, , 5335, 5340G, 5542, 5735G, 5740 5742 TM5742, 5744, 5760, 6495, 7740, 7750G, 8472, 8473, 8572, 8573, TimelineX 6495, TimelineX 8473, 
Gama eMachines Series: eMachines D530 , D640 , D642 , D728 , D730 , D732 , E440 , E442 , E530 , E640 , E642 , E650 , E730 , E732 , G440 , G530 , G640 , G730 , G730G , 
Gama Gateway Series: Gateway NS51 , NV47H , NV49 , NV50A , NV51B , NV55C , NV57H , NV59C , NV73A , NV75S , NV77H , NV79C , P5WS0
Packard Bell : EasyNote TM, LM81

",
            100, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Timisoara, Timis",
            ['images/bat/1.jpg',
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::LAPTOP,
            "Acer", "AS10D31", 2010,
            true);

        sleep(2);
        $this->addElectronicItem('Aragaz',
            "Are 4 arzatoare pe gaz aprindere electrica si cuptoful este electric aragazul este aproape nou cumparet in august 2018, este inca in garantie ,este bine intretinut nu este defect functioneaza foarte bine, pretul este negociabil

",
            800, false, 1, 0, Category::ELECTONICE_ELECTROCASNICE, "Resita, Caras-Severin",
            ['images/aragaz/1.jpg',
                "images/aragaz/2.jpg",
            ],
            SubCategory::ELECTROCASNICE,
            ItemsType::ARAGAZURI_CUPTOARE_PLITE_SI_HOTE,
            "", "", 2010,
            true);

        sleep(2);
        $this->addElectronicItem('Router Huawei',
            "Ruter Huawei Model HG 658 perfect funcțional rog și ofer seriozitate",
            90, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti, Bucuresti-Ilfov",
            ['images/router/1.jpg',
                "images/router/2.jpg",
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::MODEMURI_ROUTERE,
            "Huawei", "HG 658 ", 2017,
            true);


        sleep(2);
        $this->addElectronicItem('Mouse wireless optic HXSJ X20 2400DPI pentru jocuri 2.4GHz',
            "Mouse wireless optic HXSJ X20 2400DPI pentru jocuri 2.4GHz,nou,negru 
Caracteristici principale:
- 4 nivele DPI: 1000, 1200, 1600, 2400, de înaltă precizie, vă oferă o experiență precisă de urmărire
- stil wireless de 2,4 GHz, mai portabil decât cele cu fir
- Cu 6 taste, inclusiv rotița de derulare, DPI, butoanele stânga și dreapta, butoanele pentru pagina înainte și pagina înapoi
- Compatibil cu Windows XP / Vista / Win 7 / Win 8
- Suporturi pentru picioare netede, design ergonomic, confortabil de ținut
- Până la 10 metri distanță de operare
- Alimentare: 2 baterii AAA
- modul de lucru: optic
Marcă: HXSJ
Culoare: Negru
DPI: 1000, 1200, 1600, 2400
Tipul interfeței: USB
Număr model: X20
Numărul de butoane: 6
Tip: 2.4GHz wireless
Tehnologie fără fir: 2.4GHz

Fii sociabil, ",
            50, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Brad, Hunedoara",
            ['images/mouse/1.jpg',
                "images/mouse/2.jpg",
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::MOUSE_TASTATURI,
            "HXSJ ", "x20", 2014,
            true);


        sleep(2);
        $this->addElectronicItem('Tastatura mecanica iluminata RGB Logitech G410',
            "Tastatura arata si functioneaza ireprosabil. Vine in cutia originala cu toate accesoriile ei.

Ofer garantie 48 de ore pentru efectuarea oricaror teste.

Nu ma intereseaza schimburi.",
            400, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti, Bucuresti-Ilfov",
            ['images/tast/1.jpg',
                "images/tast/2.jpg",
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::MOUSE_TASTATURI,
            "Logitech ", "G410", 2019,
            true);
        sleep(2);
        $this->addElectronicItem('Husa silicon samsung galaxy s7 edge gold mercury produs nou',
            "Husa Silicon Samsung Galaxy S7 Edge Gold Mercury PRODUS NOU

Protejeaza smartphone-ul tau de zgarieturi atat pe spate, cat si lateralele acestuia.
Acces facil la butoanele telefonului.
Pozele sunt cu titlu informativ.

Sediu magazin TINTOM - IASI Bld. Dacia nr. 57 vis-a-vis Biserica mare - IASI
Program Luni-Vineri 10:00-19:00
Livram in toata Romania prin Fancourier 18lei (in aria de acoperire a curierului). 
Transport GRATUIT pentru comenzi de accesorii de peste 200lei indiferent de produsele comandate.

TINTOM SERVICE
Laptop - Notebook - Tablete - Telefoane GSM 
Smartphone - Gps - Calculatoare - Statii CB tir
Transport 30lei dus-intors pentru produsele trimise de dvs catre noi la reparat.",
            25, false, 0, 0, Category::ELECTONICE_ELECTROCASNICE, "Iasi, Iasi",
            ['images/s7/1.jpg',
                "images/s7/2.jpg",
            ],
            SubCategory::TELEFOANE,
            ItemsType::TELEFOANE_MOBILE,
            "Samsung", "S7 EDGE", 2017,
            true);


        sleep(2);
        $this->addElectronicItem('Webcam Logitech C920, FullHD 1080P',
            "Webcam Logitech C920, FullHD 1080p, 15 MP, Autofocus, 2 microfoane in perfecta stare de functionare.",
            250, false, 0,0, Category::ELECTONICE_ELECTROCASNICE, "Craiova, Dolj",
            [ 'images/web/1.jpg',
                "images/web/2.jpg",
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::CAMERE_VIDEO_SI_ACCESORII,
            "Logitech", "C920", 2017,
            true);

          sleep(2);
        $this->addElectronicItem('Logitech G635 2019, Surround 7.1 Casti GAMING RGB - DTS 2.0',
            "CASTILE SUNT NOI, IN CUTIE, SIGILATE, LUATE LA PRECOMANDA. NU ACCEPT SCHIMBURI

PHYSICAL SPECIFICATIONS Height: 188 mm Width: 195 mm Depth: 87 mm Weight (no cable): 344 g PC Cable Length: 9.8 m Mobile Cable Length: 1.5 m

TECHNICAL SPECIFICATIONS Headphone Driver: 50 mm Frequency response: 20 Hz-20 KHz Impedance: 39 Ohms (passive), 5k Ohms (active) Sensitivity: 93 dB SPL/mW Microphone Frequency response: 100 Hz-10 KHz MAI

MULTE DETALII PE https://www.logitechg.com/en-roeu/products/gaming-audio/g635-7-1-surround-sound-gaming-headset.html

",
            400, false, 0,0, Category::ELECTONICE_ELECTROCASNICE, "Bucuresti, Bucuresti-Ilfov   ",
            [ 'images/casti/1.jpg',
                "images/casti/2.jpg",
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::LAPTOP,
            "Logitech", "G635 ", 2019,
            true);


        sleep(2);
        $this->addElectronicItem('TCard micro sd 32 GBviteza max citire80mb/s,clasa de viteza10',
            "Card micro sd 32 GB plus adaptor ,clasa de viteza 10. 
Caracteristici 
Tip card memorie: Micro SD cu adaptor SD 
Capacitate: 32 GB 
Clasa de viteza: 10 
Standard: UHS-I U1 
Viteza maxima de citire: 80 Mb/secunda 
Viteza maxima de scriere: 10 Mb/secunda 
Alte informatii: Rezistent la apa , socuri si vibratii , raze X , rezistent la temperaturi extreme .Mărci:Eaget, Mingsford,hama,mixha,alfawise,etc.10 buc disponibile .Transport 15 lei",
            40, false, 0,0, Category::ELECTONICE_ELECTROCASNICE, "Brad, Hunedoara",
            [ 'images/card/1.jpg',
                "images/card/2.jpg",
            ],
            SubCategory::LAPTOP_PC_PERIFERICE,
            ItemsType::COMPONENTE_ACCESORII,
            "Hama", "", 2012,
            true);


        sleep(2);
        $this->addElectronicItem('Volan gaming cu padele si pedale logitech g29 | ps4 pc',
            "Volan si Pedale Gaming Logitech G29
Full Box 
Am achizitionat kitul de nou si l-am atasat ocazionat la PS4
Functioneaza ireprosabil si arata foarte bine.
Volanul are padele 
Se poate atasa atat la PS4 cat si la PC .
Fara schimburi 
Pret absolut fix !",
            900, false, 0,0, Category::ELECTONICE_ELECTROCASNICE, "Timisoara, Timis",
            [ 'images/volan/1.jpg',
                "images/volan/2.jpg",
            ],
            SubCategory::JOCURI_CONSOLE,
            ItemsType::COMPONENTE_ACCESORII,
            "Logitech", "G29", 2016,
            true);
        sleep(2);
        $this->addElectronicItem('Sistem audio Panasonic aflat inca in garantie 17 oct. 2021',
            "SISTEMUL ESTE INCA IN GARANTIE, IAR PENTRU MAI MULTE DETALII RASPUND ORICAND LA TELEFON, PANA NOAPTEA TARZIU, INDIFERENT DE ORA... AICI, ORI SMS.

- ROG CITITI ANUNTUL CU ATENTIE, IN INTREGIME.

- SISTEMUL AUDIO SE POATE VEDEA IN ORASUL GALATI, CARTIER MICRO 21, LA INTRARE IN GALATI DINSPRE BRAILA, BLOCURILE TURN, PE PARTEA DREAPTA.
- sistem audio panasonic profesional, cumparat in 16 octombrie 2017 cu suma de 4800lei.
- este cumparat de la emag, detin factura si garantia produsului.
- sistemul are garantie extinsa cu 2 ani fata de cea standard, pentru care am platit 399 de lei in plus fata de pretul de vanzare, avand garantie pana la data de 17 octombrie 2021
- il dau la schimb doar cu urmatoarele produse;
... un sistem audio mai mic ca dimensiune, de preferat un soundbar , ori sistemul audio logitech z906, plus o suma de bani, sau cu telefon mobil HUAWEI MATE 20 PRO, de alte produse nu sunt interesat.
- ARE MULTIPLE POSIBILITATI DE CONECTARE LA PC, LAPTOP, TELEFON, CALCULATOR SAU TABLETA PRIN NFC, BLUETOOTH, AUXILIAR,
- DOUA CONEXIUNI USB 3.0
- MEMORIE INTERNA 4GB
- JACK CASTI
- DOUA MUFE PENTRU CONECTAREA SEPARATA A DOUA MICROFOANE MUZICALE
- MIXAJ AUDIO DJ
- RADIO FM/AM
- CD mp3
- SISTEM DE LUMINI IN DIVERSE VARIANTE DE ILUMINARE, INCLUSIV SINCRONIZARE DUPA LINIA MELODICA.
- SUNET FOARTE CLAR, FOARTE PUTERNIC",
            5000, false, 0,0, Category::ELECTONICE_ELECTROCASNICE, "Galati, Galati",
            [ 'images/boxe/1.jpg',
                "images/boxe/2.jpg",
            ],
            SubCategory::TV_AUDIO_FOTO_VIDEO,
            ItemsType::BOXE_SISTEME_AUDIO,
            "Panasonic ", "", 2016,
            true);


        sleep(2);
        $this->addElectronicItem('Robot de bucătărie, Storcător fructe Sybilla 2 nou',
            "Storcator de fructe Sybilla 2 nou, sigilat, negociabil, dacă doriti să facă ulei de floarea soarelui, se poate, chiar și înghetată face, numai dacă doriți să separați pulpa de suc..",
            2500, false, 1,0, Category::ELECTONICE_ELECTROCASNICE, "Focsani, Vrancea",
            [ 'images/storc/1.jpg',
                "images/storc/2.jpg",
            ],
            SubCategory::ELECTROCASNICE,
            ItemsType::APARAT_DE_BUCATARIE,
            "", "", 2018,
            true);
    }


    private function addItem($title, $description, $price, $currency, $negotiable, $schimb, $category, $location, $images)
    {
        $item = new Item();
        $item->title = $title;
        $item->slug = Str::slug($title, '-');
        $item->description = $description;
        $item->price = $price;
        $item->currency = $currency;
        $item->negotiable = $negotiable;
        $item->change = $schimb;
        $item->category = $category;
        $item->location = $location;
        $item->status = Item::STATUS_ACTIVE;
        $user = User::orderByRaw("RAND()")->first();
        $item->owner = $user->id;
        $item->save();
        if (isset($images))
            foreach ($images as $image) {
                ItemsImage::create([
                    'item_id' => $item->item_id,
                    'filename' => $image
                ]);
            }
        return $item->item_id;
    }

    private function addVehicleItem($title, $description, $price, $currency, $negotiable, $schimb, $category, $location, $images, $sub_category, $type, $manufacturer, $model, $manufacturer_year, $engine, $power, $gearbox,
                                    $body, $fuel_type, $mileage, $drive, $emission_class, $color, $origin, $VIN,
                                    $used, $pollution_tax, $damaged, $first_owner, $right_hand_drive)
    {
        $vehicle = new Vehicle();
        $vehicle->item_id = $this->addItem($title, $description, $price, $currency, $negotiable, $schimb, $category, $location, $images);
        $vehicle->sub_category = $sub_category;
        $vehicle->item_type = $type;
        $vehicle->manufacturer = $manufacturer;
        $vehicle->model = $model;
        $vehicle->manufacturer_year = $manufacturer_year;
        $vehicle->engine = $engine;
        $vehicle->power = $power;
        $vehicle->gearbox = $gearbox;
        $vehicle->body = $body;
        $vehicle->fuel_type = $fuel_type;
        $vehicle->mileage = $mileage;
        $vehicle->drive = $drive;
        $vehicle->emission_class = $emission_class;
        $vehicle->color = $color;
        $vehicle->origin = $origin;
        $vehicle->VIN = $VIN;
        $vehicle->used = $used;
        $vehicle->pollution_tax = $pollution_tax;
        $vehicle->damaged = $damaged;
        $vehicle->first_owner = $first_owner;
        $vehicle->right_hand_drive = $right_hand_drive;
        $vehicle->save();
    }

    private function addElectronicItem($title, $description, $price, $currency, $negotiable, $schimb, $category, $location, $images, $sub_category, $type, $manufacturer, $model, $manufacturer_year, $used)
    {
        $electronic = new Electronic();
        $electronic->item_id = $this->addItem($title, $description, $price, $currency, $negotiable, $schimb, $category, $location, $images);
        $electronic->sub_category = $sub_category;
        $electronic->item_type = $type;
        $electronic->manufacturer = $manufacturer;
        $electronic->model = $model;
        $electronic->manufacturer_year = $manufacturer_year;
        $electronic->used = $used;
        $electronic->save();
    }
}