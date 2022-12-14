<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }


    #[Route('/add/{var}', name: 'app_pizza')]

    public function addpizza($var){
        return new Response("pizza".$var);
    }
    #[Route('/addstudent', name: 'add_student')]
    public function addStudent(ManagerRegistry  $doctrine)
    {
        $student= new Student();
        $student->setNce("123");
        $student->setUsername("asmayari");
        //$em= $this->getDoctrine()->getManager();
        $em= $doctrine->getManager();
        $em->persist($student);
        $em->flush();
        //return $this->redirectToRoute("")
        return new Response("add student");
    }




    #[Route('/list', name: 'app_pizza')]
    public function list(){
        return $this->render('student/liste.html.twig');
    }


    #[Route('/student', name: 'app_student')]
    public function lists(StudentRepository $repository){
        $students=$repository->findAll();
        return $this->render('student/lists.html.twig',array('student'=>$students));
    }

    #[Route('/addStudentForm', name: 'addStudentForm')]
    public function addClassroomForm(Request  $request,ManagerRegistry $doctrine,StudentRepository $repository)
    {
        $student= new  Student();
        $form= $this->createForm(StudentType::class,$student);
        $form->handleRequest($request) ;
        if($form->isSubmitted()){
            $em= $doctrine->getManager();
            $em->persist($student);
            $em->flush();
            return  $this->redirectToRoute("addStudentForm");
        }
        return $this->renderForm("student/add.html.twig",array("FormStudent"=>$form));
    }
    #[Route('/updatestudent/{nce}', name: 'update_student')]
    public function updateStudentForm($nce,StudentRepository  $repository,Request  $request,ManagerRegistry $doctrine)
    {
        $student= $repository->find($nce);
        $form= $this->createForm(StudentType::class,$student);
        $form->handleRequest($request) ;
        if($form->isSubmitted()){
            $em= $doctrine->getManager();
            $em->flush();
            return  $this->redirectToRoute("addStudentForm");
        }
        return $this->renderForm("student/update.html.twig",array("FormStudent"=>$form));
    }

    #[Route('/removestudent/{nce}', name: 'remove_student')]
    public function remove(ManagerRegistry $doctrine,$nce,StudentRepository $repository)
    {
        $student= $repository->find($nce);
        $em= $doctrine->getManager();
        $em->remove($student);
        $em->flush();
        return $this->redirectToRoute("addStudentForm");
    }

    #[Route('/listStudent', name: 'listStudent')]
    public function listStudent(StudentRepository  $repository)
    {
        $students= $repository->findAll();
        $sortbynce=$repository->sortByNCE();
        $topStudents=$repository->topStudent();
        return $this->render("student/liste.html.twig",array("tabStudent"=>$students,"sortbynce"=>$sortbynce,'topStudent'=>$topStudents));
    }





}