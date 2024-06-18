<?php
namespace SMTP2GO;

/**
 * Fetch email summary stats from the api
 */
class ApiSummary implements Requestable
{

    public function getEndpoint()
    {
        return 'stats/email_summary';
    }

    public function buildRequestPayload()
    {
        return array();
    }
}
