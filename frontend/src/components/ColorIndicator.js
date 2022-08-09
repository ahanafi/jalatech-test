import { Box, Flex, Text } from '@chakra-ui/react';
import React from 'react';

const ColorIndicator = ({color, text}) => {
    return (
        <>
            <Flex alignItems={'center'} justifyContent={'center'} mr='10px'>
                <Box bg={color} w='20px' h='20px' />
                <Text fontSize={'12px'} color={'gray'} ml={2}>{text}</Text>
            </Flex>
            
        </>
    );
}

export default ColorIndicator;