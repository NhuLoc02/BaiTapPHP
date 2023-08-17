<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once './models/ArticleModel.php';
$articleModel = new ArticleModel($mysqli);
class ArticleController
{
    private $articleId;
    private $articleAuthor;
    private $articleTitle;
    private $articleSummary;
    private $articleContent;
    private $articleStatus; 


    public function __construct($articleId = null, $articleAuthor = null, $articleTitle= null, $articleContent= null, $articleSummary=null, $articleStatus=null )
    {
        $this->articleId = $articleId;
        $this->articleAuthor = $articleAuthor;
        $this->articleTitle = $articleTitle;
        $this->articleSummary = $articleSummary;
        $this->articleContent = $articleContent;
        $this->articleStatus = $articleStatus;
    }
    public function articleList($articleModel)
    {
        $articles = $articleModel->getArticles();
        require_once './views/ArticleListView.php';
    }
    public function addArticle()
    {
        global $articleModel;
        if(isset($_POST['article_add'])) {
            $articleAuthor= $_POST['article_author'];
            $articleTitle= $_POST['article_title'];
            $articleSummary= $_POST['article_summary'];
            $articleContent= $_POST['article_content'];
            $articleStatus= $_POST['article_status'];
            $articleModel->addArticle($articleAuthor, $articleTitle, $articleSummary, $articleContent, $articleStatus);
            echo "<script>window.location.href = '../../BaiN1/index.php?action=article&query=article_list';</script>"; 
            
        }
        require_once './views/ArticleAddView.php';
    }
    public function editArticle()
    {
        global $articleModel;
        if(isset($_GET['article_id'])) {
            $articleId= $_GET['article_id'];
            $data= $articleModel->getArticlesId($articleId);
            if (isset($_POST['article_edit'])) {
                $articleAuthor= $_POST['article_author'];
                $articleTitle= $_POST['article_title'];
                $articleSummary= $_POST['article_summary'];
                $articleContent= $_POST['article_content'];
                $articleStatus= $_POST['article_status'];
                $articleModel->editArticle($articleId, $articleAuthor, $articleTitle, $articleSummary, $articleContent, $articleStatus);
                echo "<script>window.location.href = '../../BaiN1/index.php?action=article&query=article_list';</script>"; 
            }
        }
        require_once './views/ArticleEditView.php';
    }
    public function deleteArticle($articleId)
    {
        global $articleModel;
        $articleModel->deleteArticle($articleId);
        echo "<script>window.location.href = '../../BaiN1/index.php?action=article&query=article_list';</script>"; 
    }

}    
$articleController= new ArticleController();