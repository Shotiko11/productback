use scand;

CREATE TABLE book (
  SKU varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  name text COLLATE utf8_unicode_ci NOT NULL,
  price int(11) NOT NULL,
  weight int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table DVD
--

CREATE TABLE DVD (
  SKU varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  name text COLLATE utf8_unicode_ci NOT NULL,
  price int(11) NOT NULL,
  size int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table DVD
--

INSERT INTO DVD (SKU, name, price, size) VALUES
('7639sjdhLS', 'shotik', 32, 34535);

-- --------------------------------------------------------

--
-- Table structure for table furniture
--

CREATE TABLE furniture (
  SKU varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  name text COLLATE utf8_unicode_ci NOT NULL,
  price int(11) NOT NULL,
  height int(11) NOT NULL,
  width int(11) NOT NULL,
  length int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;