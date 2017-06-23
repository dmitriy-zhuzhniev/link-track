<?php

namespace App\Http\Controllers;

use App\Domain\Click\Click;
use App\Domain\Click\ClickId;
use App\Domain\Click\ClickRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LinkController extends Controller
{
    /**
     * @param Request $request
     *
     * @return View
     */
    public function store(Request $request, ClickRepository $clickRepository)
    {
        try {
            $click = new Click(
                new ClickId(1),
                $request->server('HTTP_USER_AGENT'),
                $request->server('REMOTE_ADDR'),
                $request->server('HTTP_REFERER'),
                $request->input('param1')
            );
            $click->setParam2($request->input('param2'));
            $clickRepository->store($click);
        } catch (UniqueConstraintViolationException $e) {
            dd($e->getPrevious());
        }
    }
}