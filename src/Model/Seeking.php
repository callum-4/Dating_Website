<?php

class Seeking
{
    private $minAge;
    private $maxAge;
    private $gender;

    // Constructor
    public function __construct($minAge, $maxAge, $gender)
    {
        $this->minAge = $minAge;
        $this->maxAge = $maxAge;
        $this->gender = $gender;
    }

    // Getters and setters
    public function getMinAge()
    {
        return $this->minAge;
    }

    public function setMinAge($minAge)
    {
        $this->minAge = $minAge;
    }

    public function getMaxAge()
    {
        return $this->maxAge;
    }

    public function setMaxAge($maxAge)
    {
        $this->maxAge = $maxAge;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setgGnder($gender)
    {
        $this->gender = $gender;
    }

}

// Define compatibility messages for each zodiac pairing
$compatibilityMessages = array(
    "aries" => array(
        "aries" => "As two fiery individuals, you both ignite passion and excitement, but you may also face challenges due to your competitive nature.",
        "cancer" => "Your boldness may overwhelm Cancer's sensitivity, but your differences can complement each other if you find common ground.",
        "gemini" => "Both lively and sociable, you enjoy a dynamic and intellectually stimulating relationship full of adventures.",
        "libra" => "Your impulsiveness may clash with Libra's desire for harmony, but with understanding, you can create a dynamic and exciting relationship.",
        "pisces" => "Your assertiveness may overpower Pisces' gentle nature, but with patience, you can learn from each other and create a harmonious balance.",
        "sagittarius" => "You're a perfect match for adventure and excitement, thriving in a relationship filled with spontaneity and shared experiences.",
        "taurus" => "Your spontaneity may clash with Taurus' need for stability, but with compromise, you can balance each other well.",
        "aquarius" => "Both independent and progressive, you enjoy a stimulating and unconventional relationship built on mutual respect and freedom.",
        "capricorn" => "Your spontaneity may clash with Capricorn's cautious nature, but with compromise, you can build a strong and enduring partnership.",
        "leo" => "You make a power couple, sharing a zest for life and a mutual respect for each other's leadership qualities.",
        "scorpio" => "Both passionate and intense, you share a deep connection but may struggle with power struggles if you don't communicate openly.",
        "virgo" => "While you may find Virgo too cautious, your differences can create a balanced partnership if you learn to appreciate each other's strengths.",


    ),
    "cancer" => array(
        "cancer" => "Two Cancer individuals form a deeply emotional bond, sharing sensitivity, intuition, and a profound understanding of each other's needs.",
        "gemini" => "While Cancer seeks emotional depth, Gemini's lighthearted approach may pose challenges, yet with understanding, you can learn to appreciate each other's differences.",
        "libra" => "Cancer's emotional sensitivity may clash with Libra's desire for harmony, but with effort, you can create a nurturing and balanced partnership.",
        "pisces" => "Cancer forms a deep and spiritual connection with Pisces, sharing empathy, creativity, and a profound understanding of each other's emotions.",
        "sagittarius" => "Cancer's need for security may clash with Sagittarius' love for adventure, but with compromise, you can learn to appreciate each other's strengths and create a balanced relationship.",
        "taurus" => "As a Cancer, you find comfort and stability with Taurus, appreciating their grounded nature and commitment to building a secure foundation.",
        "aquarius" => "Cancer's emotional depth may puzzle Aquarius, but with patience and understanding, you can learn from each other and create a unique and fulfilling bond.",
        "capricorn" => "Cancer finds stability and security with Capricorn, as both share a commitment to building a solid foundation for the future.",
        "leo" => "Cancer's nurturing nature may clash with Leo's need for attention, but with patience and compromise, you can create a loving and supportive partnership.",
        "scorpio" => "Cancer connects deeply with Scorpio, sharing intense emotions, loyalty, and a desire for profound intimacy, forming an unbreakable bond.",
        "virgo" => "Cancer's emotional depth complements Virgo's practicality, forming a harmonious relationship grounded in mutual respect and understanding.",

    ),
    "gemini" => array(
        "gemini" => "Two Geminis form a lively and intellectually stimulating partnership, enjoying endless conversations and shared adventures.",
        "libra" => "Gemini and Libra share a love for socializing, intellectual pursuits, and fairness, forming a harmonious and intellectually stimulating relationship.",
        "pisces" => " Gemini's logical approach may puzzle Pisces' emotional depth, but with patience and understanding, you can complement each other well, forming a balanced and supportive partnership.",
        "sagittarius" => "Gemini and Sagittarius enjoy a dynamic and adventurous relationship, sharing a love for exploration, freedom, and philosophical discussions.",
        "taurus" => "Gemini's need for variety and excitement may clash with Taurus' desire for stability, but with compromise, you can learn to appreciate each other's strengths.",
        "aquarius" => "Gemini and Aquarius share intellectual curiosity, innovation, and a commitment to social causes, forming a unique and intellectually stimulating bond.",
        "capricorn" => "Gemini's need for variety may clash with Capricorn's desire for stability, but with compromise, you can build a strong and enduring partnership based on mutual respect and understanding.",
        "leo" => "Gemini's wit and charm complement Leo's confidence and charisma, creating a dynamic and engaging relationship filled with excitement and fun.",
        "scorpio" => "Gemini's flirtatious nature may unsettle Scorpio's intensity, but with communication and trust, you can create a deep and meaningful connection.",
        "virgo" => "Gemini's spontaneity may challenge Virgo's practicality, but with understanding, you can balance each other's strengths and weaknesses, forming a harmonious partnership.",
    ),
    "libra" => array(
        "libra" => "Two Libras create a harmonious and balanced relationship, sharing a love for beauty, fairness, and intellectual pursuits.",
        "pisces" => "Libra's diplomacy and compassion may complement Pisces' sensitivity, forming a deeply empathetic and supportive partnership filled with romance and creativity.",
        "sagittarius" => " Libra's diplomacy may complement Sagittarius' adventurous spirit, forming a dynamic and intellectually stimulating partnership filled with exploration and excitement.",
        "taurus" => " Libra's desire for harmony may complement Taurus' grounded nature, forming a balanced and stable partnership built on mutual respect and understanding.",
        "aquarius" => "Libra and Aquarius share a love for innovation, social justice, and intellectual pursuits, creating a stimulating and unconventional relationship built on mutual respect and understanding.",
        "capricorn" => "Libra's social skills may complement Capricorn's ambition, forming a balanced and supportive partnership grounded in mutual respect and shared goals.",
        "leo" => " Libra and Leo share a love for romance, creativity, and socializing, creating a dynamic and vibrant relationship filled with excitement and passion.",
        "scorpio" => "Libra's desire for harmony may clash with Scorpio's intensity, but with effort and understanding, you can learn to appreciate each other's strengths and create a deep and meaningful connection.",
        "virgo" => "Libra's charm and diplomacy may soothe Virgo's worries, forming a supportive and balanced partnership based on mutual respect and admiration.",
    ),
    "pisces" => array(
        "pisces" => "In a Pisces/Pisces relationship, you both form a match made in zodiac heaven, effortlessly validating each other's feelings and needs while sharing a deep love for art and beauty. It's common to find yourselves teaming up on creative projects in your spare time, further strengthening your bond.",
        "sagittarius" => "Pisces' imagination and creativity may complement Sagittarius' adventurous spirit, forming an inspiring and spiritually fulfilling partnership filled with exploration and growth.",
        "taurus" => "Pisces finds comfort and understanding with Taurus, appreciating their gentle nature and shared love for romance and creativity.",
        "aquarius" => "Pisces' sensitivity may puzzle Aquarius' intellectual nature, but with patience and understanding, you can complement each other well, forming a unique and spiritually enriching bond.",
        "capricorn" => "Pisces finds stability and security with Capricorn, appreciating their practicality and determination, forming a supportive and enduring partnership built on mutual respect and shared values.",
        "leo" => "Pisces' sensitivity may complement Leo's warmth and generosity, forming a deep and emotionally fulfilling partnership filled with mutual admiration and support.",
        "scorpio" => "Pisces shares a deep emotional bond with Scorpio, appreciating their intensity and loyalty, creating a profound and transformative relationship filled with passion and depth.",
        "virgo" => "Pisces' intuition and empathy may soothe Virgo's worries, forming a compassionate and nurturing partnership grounded in mutual respect and understanding.",
    ),
    "sagittarius" => array(
        "sagittarius" => "Your shared adventurous spirit and love for freedom create a thrilling and dynamic relationship filled with spontaneity and growth.",
        "taurus" => "Bridging adventure with stability, your relationship intertwines Sagittarius's optimism with Taurus's grounded nature, forming a resilient and enduring partnership.",
        "aquarius" => "Your relationship thrives on intellectual stimulation and shared ideals, blending Sagittarius's optimism with Aquarius's innovation, resulting in a dynamic and progressive partnership.",
        "capricorn" => "Balancing adventure with responsibility, your connection merges Sagittarius's free-spiritedness with Capricorn's determination and ambition, fostering a relationship grounded in both excitement and stability.",
        "leo" => "Your partnership is fiery and vibrant, combining Sagittarius's adventurous spirit with Leo's charisma and passion, resulting in a dynamic and inspiring union.",
        "scorpio" => "Balancing intensity with optimism, your connection blends Scorpio's depth with Sagittarius's zest for life, fostering a transformative and passionate bond.",
        "virgo" => " Despite differences in approach, your connection is built on mutual respect and growth, blending Sagittarius's optimism with Virgo's practicality and attention to detail, resulting in a supportive and evolving relationship.",
    ),
    "taurus" => array(
        "taurus" => "Your relationship is rooted in stability and shared values, forming a strong and enduring bond built on mutual understanding and loyalty.",
        "aquarius" => "Despite differences in approach, your connection is characterized by mutual respect and innovation, blending Taurus's practicality with Aquarius's forward-thinking nature, resulting in a dynamic and unconventional partnership.",
        "capricorn" => "Balancing tradition with determination, your partnership merges Taurus's sensuality and reliability with Capricorn's ambition and practicality, resulting in a grounded and successful union.",
        "leo" => "Your connection is characterized by a blend of sensuality and charisma, combining Taurus's earthy stability with Leo's confidence and passion, resulting in a vibrant and luxurious relationship.",
        "scorpio" => "Despite potential challenges, your connection is intense and transformative, blending Taurus's sensuality with Scorpio's depth and passion, resulting in a powerful and deeply intimate bond.",
        "virgo" => "Your relationship is grounded in practicality and mutual support, blending Taurus's stability and sensuality with Virgo's attention to detail and nurturing nature, resulting in a harmonious and fulfilling partnership.",
    ),
    "aquarius" => array(
        "aquarius" => "Your relationship is marked by innovation and intellectual stimulation, with both partners embracing their uniqueness and fostering a dynamic and progressive union.",
        "capricorn" => "Balancing innovation with practicality, your connection merges Aquarius's forward-thinking nature with Capricorn's ambition and discipline, resulting in a relationship grounded in both creativity and stability.",
        "leo" => "Your partnership is characterized by mutual respect and admiration, blending Aquarius's independence and innovation with Leo's confidence and leadership, resulting in a dynamic and inspiring bond.",
        "scorpio" => "Despite potential challenges, your connection is intense and transformative, blending Aquarius's intellectual curiosity with Scorpio's depth and passion, resulting in a relationship marked by profound emotional growth.",
        "virgo" => "Your relationship thrives on mutual respect and intellectual compatibility, blending Aquarius's visionary ideas with Virgo's practicality and attention to detail, resulting in a harmonious and supportive partnership.",
    ),
    "capricorn" => array(
        "capricorn" => "Your relationship is characterized by ambition and determination, with both partners working towards common goals and building a solid and enduring bond based on mutual respect and shared values.",
        "leo" => "Balancing ambition with creativity, your connection merges Capricorn's practicality and discipline with Leo's charisma and passion, resulting in a dynamic and successful partnership where both partners inspire and support each other.",
        "scorpio" => "Despite potential challenges, your connection is intense and transformative, blending Capricorn's ambition and stability with Scorpio's depth and emotional intensity, resulting in a powerful and deeply intimate bond.",
        "virgo" => "Your relationship is grounded in practicality and mutual support, blending Capricorn's ambition and determination with Virgo's attention to detail and nurturing nature, resulting in a harmonious and fulfilling partnership where both partners work together towards shared goals.",
    ),
    "leo" => array(
        "leo" => "Your relationship is marked by passion and creativity, with both partners embracing their individuality and creating a vibrant and exciting bond filled with romance and mutual admiration.",
        "scorpio" => "Despite potential challenges, your connection is intense and magnetic, blending Leo's confidence and charisma with Scorpio's depth and emotional intensity, resulting in a powerful and transformative partnership where both partners inspire and challenge each other.",
        "virgo" => "Your relationship balances Leo's flair and creativity with Virgo's practicality and attention to detail, resulting in a dynamic and harmonious union where both partners complement each other's strengths and support each other's growth.",
    ),
    "scorpio" => array(
        "scorpio" => "Your relationship is intense and deeply emotional, with both partners sharing a profound understanding of each other's desires and fears, creating a bond that is passionate, transformative, and sometimes tumultuous.",
        "virgo" => "Despite differences in approach, your connection is characterized by mutual respect and emotional depth, blending Scorpio's intensity with Virgo's practicality and attention to detail, resulting in a relationship that is both nurturing and transformative.",
    ),
    "virgo" => array(
        "virgo" => "Your relationship is marked by practicality and attention to detail, with both partners sharing a deep understanding of each other's needs and working together to create a structured and orderly environment where they can both thrive.",
    ),

);

// Retrieve compatibility message based on the input zodiac signs
$input1 = strtolower($_GET["input1"]);
$input2 = strtolower($_GET["input2"]);

// Check if the inputs are valid zodiac signs and if a compatibility message exists for the provided signs
if (isset ($compatibilityMessages[$input1]) && isset ($compatibilityMessages[$input1][$input2])) {
    echo $compatibilityMessages[$input1][$input2];
} elseif (isset ($compatibilityMessages[$input2]) && isset ($compatibilityMessages[$input2][$input1])) {
    // If the combination doesn't exist, check if the reverse combination exists
    echo $compatibilityMessages[$input2][$input1];
} else {
    echo "Invalid zodiac signs or no compatibility message found for the provided signs.";
}


?>