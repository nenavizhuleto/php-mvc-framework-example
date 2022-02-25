class Entity
{
    protected string $name;
    protected string $surname;
    
    public final function build(array $values)
    {
        foreach ($values as $key => $value)
        {
            $this->{ $key } = value;
        }
    }
}