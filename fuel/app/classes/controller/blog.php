<?php
use Fuel\Core\Controller_Template;
use Fuel\Core\Response;
use Fuel\Core\Input;
use Fuel\Core\View;

class Controller_Blog extends Controller_Template
{
    public function before()
    {
        parent::before();

        $this->template->categories = Model_Category::find('all');
        $this->template->title = "";
    }

    public function action_index($category_id=null)
    {
        $data = array();
        if ($category_id !== null) {
            $category = Model_Category::find($category_id);

            if ($category != null) {
                $data['entries'] = $category->blogs;
                $data['category'] = $category->category_title;

                $this->template->category_id = $category_id;
                $this->template->title = " / ".$category->category_title;
            }
        } else {
            $data['entries'] = Model_Blog::find('all');
        }
        if (empty($data)) {
            $this->setError404("Category with this ID doesn't exists!");
        } else {
            $this->template->content = View::forge('blog/entry', $data);
        }
    }

    public function action_create()
    {
        $data['entry'] = array(
            'entry_title' => Input::post('title'),
            'entry_excerpt' => Input::post('excerpt'),
            'entry_description' => Input::post('description'),
            'entry_category_id' => Input::post('category'),
        );

        if (Input::post('title') && Input::post('category')) {
            $entry = new Model_Blog($data['entry']);
            $entry->save();

            Response::redirect('view/'.$entry->entry_id);
        } else {
            if (Input::method() == "POST")
                $data['error'] = "Article title field can't be empty!";
        }

        $data['categories'] = $this->serializedCategories();

        $this->template->title = " / Create article";
        $this->template->content = View::forge('blog/entry_form', $data);
    }

    public function action_edit($id=null)
    {
        $entry = Model_Blog::find($id);
        if ($entry != null) {
            if (Input::post('title') && Input::post('category')) {
                $entry->entry_title = Input::post('title');
                $entry->entry_excerpt = Input::post('excerpt');
                $entry->entry_description = Input::post('description');
                $entry->entry_category_id = Input::post('category');
                $entry->save();

                $data['update_success'] = true;
            } else {
                if (Input::method() == "POST")
                    $data['error'] = "Article title field can't be empty!";
            }

            $data['entry'] = array(
                'entry_title' => $entry->entry_title,
                'entry_excerpt' => $entry->entry_excerpt,
                'entry_description' => $entry->entry_description,
                'entry_category_id' => $entry->entry_category_id,
            );

            $data['categories'] = $this->serializedCategories();
            $data['edit_article'] = true;
            $data['entry_id'] = $entry->entry_id;

            $this->template->title = " / ".$entry->entry_title." (editing)";
            $this->template->content = View::forge('blog/entry_form', $data);
        } else {
            $this->setError404("Entry with this ID doesn't exists!");
        }
    }

    public function action_view($id=null)
    {
        $entry = Model_Blog::find($id);
        if ($entry != null) {
            $data['entries'] = array($entry);
            $data['single'] = true;

            $this->template->title = " / ".$entry->entry_title;
            $this->template->content = View::forge('blog/entry', $data);
        } else {
            $this->setError404("Entry with this ID doesn't exists!");
        }
    }

    public function action_delete($id=null)
    {
        $data['entry_id'] = $id;

        $this->template->title = " / Delete";
        $this->template->content = View::forge('blog/accept_delete', $data);
    }

    public function post_delete($id=null)
    {
        $entry = Model_Blog::find($id);
        if ($entry != null) {
            $entry->delete();

            Response::redirect('/');
        } else {
            $this->setError404("Entry with this ID doesn't exists!");
        }
    }

    public function setError404($e=null)
    {
        $data['error'] = $e;

        $this->template->title = " / ERROR 404";
        $this->template->content = View::forge('blog/404', $data);
    }

    public function action_404()
    {
        $this->setError404("You are looking for something that doesn't exists!");
    }

    public function serializedCategories()
    {
        $categorySerialArr = array();

        $categories = Model_Category::find('all');
        foreach ($categories as $category) {
            $categorySerialArr[$category->category_id] = $category->category_title;
        }

        return $categorySerialArr;
    }
}
