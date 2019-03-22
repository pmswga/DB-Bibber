#ifndef HELPCOMMAND_H
#define HELPCOMMAND_H

#include "abstractcommand.h"
#include <iostream>
using std::cout;

class HelpCommand : public AbstractCommand
{
public:
    HelpCommand();
    
    void execute();
};

#endif
