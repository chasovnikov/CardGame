<?php

namespace Modules\CardGame\Http\Controllers;

use Illuminate\View\View;
use Modules\CardGame\Http\Entities\Race;
use App\Http\Controllers\BaseController;
use Modules\CardGame\Http\Entities\CardSet;
use Modules\CardGame\Repositories\CardSetRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CardSetController extends BaseController
{
    /**
     * BaseController constructor.
     *
     * @param CardSetRepository $repository
     */
    public function __construct(CardSetRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return View
     */
    public function index()
    {
        self::checkAdmin();

        return view('cardgame::card_set.index')->with([
            'cardSets' => $this->repository->showEntitiesByClassName(CardSet::class, 'set_name'),
            'races' => $this->repository->showEntitiesByClassName(Race::class),
            'types' => CardSet::TYPES,
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        self::checkAdmin();

        $cardSet = parent::edit($id);

        return view('cardgame::card_set.update')->with([
            'cardSet' => $cardSet,
        ]);
    }

}