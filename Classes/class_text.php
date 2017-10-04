<?php
// we should add textId 
// All getter Method must take id as a prammetter 
class class_text {

        private $id;
	private $title;
	private $content;
	private $date;
	private $attachmentID;
	private $firstComingDate;
	private $publishDate;
	private $appearState;
	private $retouchState;
	private $viewsNumber;
	private $category;
	private $link;

//Methods

public function setTextID( $id )
	{
		$this->id = $id;
	} // end setTextID()	

public function getTextID ( )
	{
		return $this->id;
	} // end getTextID()	
	


public function getPublishDate( )
	{
		return $this->publishDate;
	} // end getPublishDate()	


public function getFirstComingDate( )
	{
		return $this->firstComingDate;
	} // end getFirstComingDate()	


public function setAttachmentID ( $id )
	{
				$this->attachmentID = $id;
	} // end setAttachmentID()	


public function getAttachmentID ( )
	{
		return $this->attachmentID;
	} // end getAttachmentID()	


public function setRetouchState ( $retouchState )
	{
		$this->retouchState = $retouchState;
	} // end setRetouchState()	

public function getRetouchState ( )
	{
		return $this->retouchState;
	} // end getRetouchState()	

    public function setDate( $fDate )
    {
            $this->date = $fDate;
            return TRUE;
    }// end of setDate
    
    public function getDate ()
    {
            return $this->date;
    }// end of getDate
    
    public function setCatagory ( $fCatagory )
    {
        // what are validation here ??
            $this->category= $fCatagory;
            return true;
        
    }// enf of setCatagory
    
    public function getCatagory ( )
    {
            return $this->category ;
    }// end of fetCatagory
    
    public function setContent( $fContact )
    {
        // what are validation here ??
            $this->content = $fContact;
            return TRUE;
    }// end of setContact
    
    public function getContent ()
    {
            return $this->content;
    } //end of getContent()
    
    public function  setLink ( $fLink )
    {
        // what are validations here ??
            $this->link = $fLink ; 
            return TRUE;
            
    }// end of setLink
    
    public function  getLink ()
    {
            return $this->link;
    }// end of getLink
    
    public function setAppearState ( $fState )
    {
          // what are validations here ??
            $this->appearState = $fState;
            return TRUE;
    } // end of setState
    
    public function getAppearState ()
    {
        return $this->appearState;
    }// end of getState
    
    public function setTitle ( $fTitle )
    {
            $this->title = $fTitle;
    }// end of setTitle
    
    public function getTitle ()
    {
            return $this->title;
    }// end of getTitle
    
    public function setViewsNumber( $fViewsNumber )
    {
            if(is_numeric($fViewsNumber))
            {
                $this->viewsNumber = $fViewsNumber;
                return TRUE;
            }//end if 
            else
            {
                return FALSE;
            }// enf else 
    }// end of setViewsNumber
    
    public function getViewsNumber()
    {
        return $this->viewsNumber;
    }// end of getViewsNumber
    
    

} // end class_text	

?>
