<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ClientFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('IsLoggin')) {
            return redirect()->to('/login');
        }
        $session = session();
        if ($session->get('role') !== 'client') {
            return redirect()->to('/');
        }   
        if ($session->get('accountStatus') == 'restricted') {
            $session->setFlashdata('error', 'Your account has been restricted. Please contact customer service for assistance.');
            return redirect()->to('/login');
        } elseif ($session->get('accountStatus') == 'inactive') {
            $session->setFlashdata('warning', 'Account Inactive. Due to 30 days without login');
            return redirect()->to('/login');
        } elseif ($session->get('confirm') == 'false') {
            $session->setFlashdata('success', 'Please wait for admin confirmation');
            return redirect()->to('/login');
        } 
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
