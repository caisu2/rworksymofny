<?php

namespace App\Controller;

use App\Repository\RequestersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/requester')]
class RequesterController extends AbstractController
{
    private $requesterRepository;

    public function __construct(RequestersRepository $requesterRepository) {
        $this->requesterRepository = $requesterRepository;
    } 


    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/list', name: 'requester_list')]
    public function list()
    {
        $requester = $this->requesterRepository->getRequesterList();
        $view = $this->render('list.html.twig', ['requesters' => $requester])->getContent();

        // dd($view);
        return $this->json($view);
    }

    #[Route('/delete', name: 'delete_requester')]
    public function delete(Request $request)
    {
        $id = $request->query->get('id');
        
        $response = $this->requesterRepository->softDelete($id);

        return $this->json($response);
    }

    #[Route('/deny', name: 'deny_requester')]
    public function deny(Request $request)
    {
        $id = $request->query->get('id');
        
        $response = $this->requesterRepository->denyRequester($id);

        return $this->json($response);
    }

    #[Route('/save', name: 'save_requester')]
    public function save(Request $request) 
    {
        $data = $request->get('requester');

        $response = $this->requesterRepository->save($data);

        return $this->json($response);
    }
}
