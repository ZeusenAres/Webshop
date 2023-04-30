<?php
class RedcomAPI
{
    private string $baseUrl = 'localhost:9085';

    public function getAllUsers(string $endpoint, string $body = '{}') : array
    {
        $ch = curl_init();
        $headers = array(
        'Accept: application/json',
        'Content-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60 * 5);

        $response = curl_exec($ch);

        return json_decode($response);
    }
}