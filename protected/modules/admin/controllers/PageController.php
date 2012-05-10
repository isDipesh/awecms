<?php

class PageController extends Controller{
    
    public function missingAction($actionID) {
        $this->forward('/page');
    }
    
}