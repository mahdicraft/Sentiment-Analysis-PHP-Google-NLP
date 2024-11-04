<?php
require_once 'src/analyze_sentiment.php';

// Sample text to test the sentiment analysis function
$text = "This is a test for sentiment analysis.";

$result = analyzeSentiment($text);
$sentimentScore = $result['documentSentiment']['score'];

// Output the sentiment score and classification
echo "Sentiment Score: $sentimentScore\n";
echo $sentimentScore > 0 ? "Positive" : ($sentimentScore < 0 ? "Negative" : "Neutral");
