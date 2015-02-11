<?php

namespace Ens\BookerBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Ens\BookerBundle\Entity\Employees;
 
class LoadEmployeesData extends AbstractFixture implements OrderedFixtureInterface,ContainerAwareInterface
{
	/**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $em)
    {
        for($i=1;$i<=3;$i++){
			$user = new Employees();
			$user->setUsername('user'.$i);
			
			$password = 'password'.$i;
			$factory = $this->container->get('security.encoder_factory');
			$encoder = $factory->getEncoder($user);
			$encodedPassword = $encoder->encodePassword($password, $user->getSalt());
			$user->setPassword($encodedPassword);

			$this->addReference('member'.$i, $user);
			$em->persist($user);
		}
		
        $em->flush();
    }
 
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}