<?php
class Url
{
    /**
     * Get random token in hexidecimal length = n.
     *
     * @param int $lengthToken
     *
     * @return string
     */
    public function get_token(int $lengthToken)
    {
        $characters = '0123456789ABCDEF';
        $randomString = '';
        for ($i = 0; $i < $lengthToken; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    /**
     * Get domain origin without path.
     *
     * @param string $url
     *
     * @return string
     */
    public function get_domain(string $url = null)
    {
        if($url === null )
            Debug::jsn($_SERVER);
        $url = parse_url($url);

        return "{$url['scheme']}://{$url['host']}";
    }

    /**
     * Get unique URL.
     *
     * @param string $url
     * @param int    $lengthUniq
     *
     * @return string
     */
    public function get_uniq_url(string $url, int $lengthUniq = 10)
    {
        return $this->get_domain($url) . '/' . $this->get_token($lengthUniq);
    }
}