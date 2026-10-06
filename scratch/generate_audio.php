<?php

$sampleRate = 44100;
$duration = 6; // 6 seconds audio sample
$numSamples = $sampleRate * $duration;
$data = '';

// Generate a pleasant multi-note voice AI greeting chime sequence (C5, E5, G5, C6)
$notes = [
    ['freq' => 523.25, 'start' => 0.0],
    ['freq' => 659.25, 'start' => 0.4],
    ['freq' => 783.99, 'start' => 0.8],
    ['freq' => 1046.50, 'start' => 1.2],
    ['freq' => 880.00, 'start' => 2.0],
    ['freq' => 1046.50, 'start' => 2.5],
];

for ($i = 0; $i < $numSamples; $i++) {
    $t = $i / $sampleRate;
    $sample = 0;

    foreach ($notes as $note) {
        if ($t >= $note['start']) {
            $elapsed = $t - $note['start'];
            $envelope = exp(-2.0 * $elapsed);
            $freq = $note['freq'];
            $sample += 0.20 * sin(2 * M_PI * $freq * $t) * $envelope;
            $sample += 0.08 * sin(2 * M_PI * ($freq * 2) * $t) * $envelope;
        }
    }

    $sample = max(-1.0, min(1.0, $sample));
    $val = (int) ($sample * 32767);
    $data .= pack('v', $val);
}

$dataSize = strlen($data);
$header = 'RIFF';
$header .= pack('V', 36 + $dataSize);
$header .= 'WAVE';
$header .= 'fmt ';
$header .= pack('V', 16);
$header .= pack('v', 1);
$header .= pack('v', 1);
$header .= pack('V', $sampleRate);
$header .= pack('V', $sampleRate * 2);
$header .= pack('v', 2);
$header .= pack('v', 16);
$header .= 'data';
$header .= pack('V', $dataSize);

$content = $header.$data;
file_put_contents(__DIR__.'/../public/demo.mp3', $content);
file_put_contents(__DIR__.'/../public/demo.wav', $content);

echo 'Successfully generated demo audio: '.strlen($content)." bytes\n";
